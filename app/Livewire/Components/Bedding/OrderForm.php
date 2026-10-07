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
            'name' => [
                'bail',
                'required',
                'string',
                'min:2',
                'max:100',
            ],
            'phone' => [
                'bail',
                'required',
                'string',
                'regex:/^\+7[0-9]{10}$/',
            ],
            'email' => [
                'bail',
                'required_if:wantsNewsletter,true',
                'nullable',
                'string',
                'email:rfc',
                'max:255',
            ],
            'message' => [
                'bail',
                'required',
                'string',
                'min:5',
                'max:1000',
            ],
            'wantsNewsletter' => [
                'boolean',
            ],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Введите имя.',
            'name.string' => 'Имя должно быть строкой.',
            'name.min' => 'Имя должно содержать не менее :min символов.',
            'name.max' => 'Имя не должно превышать :max символов.',

            'phone.required' => 'Введите телефон.',
            'phone.string' => 'Номер телефона должен быть строкой.',
            'phone.regex' => 'Введите полный номер в формате +7 (999) 999-99-99.',

            'email.required_if' => 'Укажите электронную почту для подписки.',
            'email.string' => 'Адрес электронной почты должен быть строкой.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.max' => 'Адрес не должен превышать :max символов.',

            'message.required' => 'Опишите, что хотите заказать.',
            'message.string' => 'Описание должно быть строкой.',
            'message.min' => 'Описание должно содержать не менее :min символов.',
            'message.max' => 'Описание не должно превышать :max символов.',

            'wantsNewsletter.boolean' => 'Некорректное значение согласия на рассылку.',
        ];
    }

    public function submit(): void
    {
        $this->sent = false;
        $this->resetValidation();

        $rateLimitKey = 'bedding-order:'.(request()->ip() ?? 'unknown');

        if (RateLimiter::tooManyAttempts($rateLimitKey, 5)) {
            $seconds = RateLimiter::availableIn($rateLimitKey);

            throw ValidationException::withMessages([
                'form' => 'Слишком много попыток. Повторите через '
                    .$seconds.' сек.',
            ]);
        }

        // Учитываем попытку, даже если валидация или сохранение не пройдут.
        RateLimiter::hit($rateLimitKey, 60);

        $this->name = trim($this->name);
        $this->phone = $this->normalizePhone($this->phone);
        $this->email = Str::lower(trim($this->email));
        $this->message = trim($this->message);

        $validated = $this->validate();

        $email = $validated['email'] ?? null;

        $data = [
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $email !== '' ? $email : null,
            'message' => $validated['message'],
            'ip_address' => request()->ip(),
            'user_agent' => Str::limit(
                (string) request()->userAgent(),
                500,
                ''
            ),
        ];

        try {
            $order = DB::transaction(
                function () use ($data, $validated): BeddingOrder {
                    $order = BeddingOrder::query()->create($data);

                    if (
                        $validated['wantsNewsletter']
                        && $data['email'] !== null
                    ) {
                        $subscriber = NewsletterSubscriber::query()
                            ->firstOrNew([
                                'email' => $data['email'],
                            ]);

                        $subscriber->fill([
                            'name' => $data['name'],
                            'source' => 'bedding-order',
                            'subscribed_at' => now(),
                            'unsubscribed_at' => null,
                        ]);

                        // Не меняем существующий токен отписки.
                        if (empty($subscriber->unsubscribe_token)) {
                            $subscriber->unsubscribe_token = Str::random(64);
                        }

                        $subscriber->save();
                    }

                    return $order;
                }
            );
        } catch (Throwable $exception) {
            report($exception);

            $this->addError(
                'form',
                'Не удалось сохранить заявку. Попробуйте позже.'
            );

            return;
        }

        // Заявка уже сохранена. Ошибка почты не отменяет сохранение.
        $this->sendNotifications($order);

        $this->reset([
            'name',
            'phone',
            'email',
            'message',
            'wantsNewsletter',
        ]);

        $this->resetValidation();
        $this->sent = true;
    }

    public function updated(string $property): void
    {
        if (
            ! in_array(
                $property,
                [
                    'name',
                    'phone',
                    'email',
                    'message',
                    'wantsNewsletter',
                ],
                true
            )
        ) {
            return;
        }

        $this->sent = false;

        $this->resetValidation($property);
        $this->resetValidation('form');

        if ($property === 'wantsNewsletter') {
            $this->resetValidation('email');
        }
    }

    public function render(): View
    {
        return view('components.bedding.order-form');
    }

    private function sendNotifications(BeddingOrder $order): void
    {
        $adminEmail = config('order-bedding.notifications.email');

        if (is_string($adminEmail)) {
            $adminEmail = trim($adminEmail);

            if (
                $adminEmail !== ''
                && filter_var(
                    $adminEmail,
                    FILTER_VALIDATE_EMAIL
                ) !== false
            ) {
                try {
                    Notification::route('mail', $adminEmail)
                        ->notify(
                            new NewBeddingOrderNotification($order)
                        );
                } catch (Throwable $exception) {
                    report($exception);
                }
            }
        }

        // Отдельный try/catch: ошибка письма менеджеру
        // не должна препятствовать уведомлению клиента.
        if (
            is_string($order->email)
            && trim($order->email) !== ''
        ) {
            try {
                Notification::route('mail', $order->email)
                    ->notify(
                        new BeddingOrderReceivedNotification($order)
                    );
            } catch (Throwable $exception) {
                report($exception);
            }
        }
    }

    private function normalizePhone(string $phone): string
    {
        $phone = trim($phone);

        if ($phone === '') {
            return '';
        }

        // Не превращаем строку с буквами в допустимый номер.
        if (preg_match('/^[+0-9()\s-]+$/D', $phone) !== 1) {
            return $phone;
        }

        $digits = preg_replace('/[^0-9]+/', '', $phone) ?? '';

        // Номер без кода страны: 9991234567.
        if (preg_match('/^[0-9]{10}$/D', $digits) === 1) {
            return '+7'.$digits;
        }

        // Номер с кодом страны: 79991234567.
        if (preg_match('/^7[0-9]{10}$/D', $digits) === 1) {
            return '+'.$digits;
        }

        // Номер с начальной восьмёркой: 89991234567.
        if (preg_match('/^8[0-9]{10}$/D', $digits) === 1) {
            return '+7'.substr($digits, 1);
        }

        // Неполный или неподходящий номер будет отклонён валидацией.
        return $phone;
    }
}
