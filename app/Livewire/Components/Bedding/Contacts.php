<?php

namespace App\Livewire\Components\Bedding;

use App\Notifications\BeddingOrderReceivedNotification;
use App\Notifications\NewBeddingOrderNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Throwable;

class Contacts extends Component
{
    public string $name = '';

    public string $email = '';

    public bool $sent = false;

    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
            'email' => [
                'required',
                'string',
                'email:rfc',
                'max:255',
            ],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Укажите ваше имя.',
            'name.string' => 'Имя должно быть строкой.',
            'name.min' => 'Имя должно содержать не менее 2 символов.',
            'name.max' => 'Имя не должно превышать 100 символов.',

            'email.required' => 'Укажите электронную почту.',
            'email.string' => 'Электронная почта должна быть строкой.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.max' => 'Адрес электронной почты слишком длинный.',
        ];
    }

    public function updated(string $property): void
    {
        if (! in_array($property, ['name', 'email'], true)) {
            return;
        }

        $this->sent = false;

        $this->resetValidation($property);
        $this->resetValidation('form');
    }

    public function submit(): void
    {
        $this->sent = false;

        $this->name = trim($this->name);
        $this->email = mb_strtolower(trim($this->email));

        $validated = $this->validate();

        $managerEmail = config('bedding.manager_email')
            ?: config('mail.from.address');

        if (! $managerEmail) {
            $this->addError(
                'form',
                'Адрес получателя не настроен. Пожалуйста, свяжитесь с нами по телефону.'
            );

            return;
        }

        try {
            // Уведомление менеджеру о новом обращении.
            Notification::route('mail', [
                $managerEmail => 'Менеджер',
            ])->notify(
                new NewBeddingOrderNotification($validated)
            );

            // Подтверждение пользователю.
            Notification::route('mail', [
                $validated['email'] => $validated['name'],
            ])->notify(
                new BeddingOrderReceivedNotification(
                    $validated['name']
                )
            );
        } catch (Throwable $exception) {
            report($exception);

            $this->addError(
                'form',
                'Не удалось отправить обращение. Попробуйте ещё раз или позвоните нам.'
            );

            return;
        }

        $this->reset(['name', 'email']);
        $this->resetValidation();

        $this->sent = true;
    }

    public function render(): View
    {
        $contactPhone = (string) config(
            'bedding.contact_phone',
            '+7 (831) 000-00-00'
        );

        $contactEmail = (string) config(
            'bedding.contact_email',
            'info@example.ru'
        );

        $phoneDigits = preg_replace('/\D+/', '', $contactPhone) ?? '';
        $phoneHref = '+'.$phoneDigits;

        $socials = config('bedding.socials', []);

        $socials[] = [
            'type' => 'email',
            'name' => $contactEmail,
            'description' => 'Написать на почту',
            'href' => 'mailto:'.$contactEmail,
            'iconClass' => 'bg-[#a96c62] text-white',
        ];

        return view('components.bedding.contacts', [
            'contactPhone' => $contactPhone,
            'phoneHref' => $phoneHref,
            'contactEmail' => $contactEmail,
            'socials' => $socials,
        ]);
    }
}
