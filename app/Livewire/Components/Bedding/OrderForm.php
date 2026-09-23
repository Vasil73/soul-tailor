<?php

declare(strict_types=1);

namespace App\Livewire\Components\Bedding;

use App\Models\BeddingOrder;
use App\Models\NewsletterSubscriber;
use App\Notifications\BeddingOrderReceivedNotification;
use App\Notifications\NewBeddingOrderNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Throwable;

final class OrderForm extends Component
{
    public string $name = '';

    public string $phone = '';

    public string $email = '';

    public string $message = '';

    public bool $wantsNewsletter = false;

    public bool $sent = false;

    protected function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'string', 'min:2', 'max:100'],
            'phone' => ['bail', 'required', 'string', 'regex:/^\+7\d{10}$/'],
            'email' => ['bail', 'nullable', 'required_if:wantsNewsletter,true', 'string', 'email:rfc', 'max:255'],
            'message' => ['bail', 'required', 'string', 'min:5', 'max:1000'],
            'wantsNewsletter' => ['boolean'],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Введите имя.',
            'name.min' => 'Имя должно содержать не менее :min символов.',
            'name.max' => 'Имя не должно превышать :max символов.',
            'phone.required' => 'Введите телефон.',
            'phone.regex' => 'Введите полный номер в формате +7 (999) 999-99-99.',
            'email.required_if' => 'Укажите электронную почту для подписки.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.max' => 'Адрес не должен превышать :max символов.',
            'message.required' => 'Опишите, что хотите заказать.',
            'message.min' => 'Описание должно содержать не менее :min символов.',
            'message.max' => 'Описание не должно превышать :max символов.',
            'wantsNewsletter.boolean' => 'Некорректное значение согласия на рассылку.',
        ];
    }

    public function submit(): void
    {
        $this->sent = false;
        $this->resetValidation();
        $key = 'bedding-order:'.(request()->ip() ?? 'unknown');
        if (RateLimiter::tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages(['form' => 'Слишком много попыток. Повторите через '.RateLimiter::availableIn($key).' сек.']);
        }
        $this->name = trim($this->name);
        $this->phone = $this->normalizePhone($this->phone);
        $this->email = Str::lower(trim($this->email));
        $this->message = trim($this->message);
        $v = $this->validate();
        $data = ['name' => $v['name'], 'phone' => $v['phone'], 'email' => $v['email'] !== '' ? $v['email'] : null, 'message' => $v['message'], 'ip_address' => request()->ip(), 'user_agent' => Str::limit((string) request()->userAgent(), 500, '')];
        try {
            $order = DB::transaction(function () use ($data, $v): BeddingOrder {
                $order = BeddingOrder::query()->create($data);
                if ($v['wantsNewsletter'] && $data['email'] !== null) {
                    NewsletterSubscriber::query()->updateOrCreate(['email' => $data['email']], ['name' => $data['name'], 'source' => 'bedding-order', 'unsubscribe_token' => Str::random(64), 'subscribed_at' => now(), 'unsubscribed_at' => null]);
                }

                return $order;
            });
        } catch (Throwable $e) {
            report($e);
            $this->addError('form', 'Не удалось сохранить заявку. Попробуйте позже.');

            return;
        }
        RateLimiter::hit($key, 60);
        $this->notify($order);
        $this->reset(['name', 'phone', 'email', 'message', 'wantsNewsletter']);
        $this->sent = true;
    }

    public function updated(string $property): void
    {
        if (in_array($property, ['name', 'phone', 'email', 'message', 'wantsNewsletter'], true)) {
            $this->sent = false;
            $this->resetValidation($property);
            $this->resetValidation('form');
        }
    }

    public function render(): View
    {
        return view('components.bedding.order-form');
    }

    private function notify(BeddingOrder $order): void
    {
        try {
            $admin = config('bedding.notifications.email');
            if (is_string($admin) && $admin !== '') {
                Notification::route('mail', $admin)->notify(new NewBeddingOrderNotification($order));
            }
            if ($order->email !== null) {
                Notification::route('mail', $order->email)->notify(new BeddingOrderReceivedNotification($order));
            }
        } catch (Throwable $e) {
            report($e);
        }
    }

    private function normalizePhone(string $phone): string
    {
        $d = preg_replace('/\D+/', '', trim($phone)) ?? '';
        if (preg_match('/^7\d{10}$/', $d)) {
            return '+'.$d;
        }
        if (preg_match('/^8\d{10}$/', $d)) {
            return '+7'.substr($d, 1);
        }

        return trim($phone);
    }
}
