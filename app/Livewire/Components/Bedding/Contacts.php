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

        $validated = $this->validated();

        $managerEmail = config('contacts.orders_email');

        $managerEmail = is_string($managerEmail)
            ? trim($managerEmail)
            : '';

        if (
            $managerEmail === ''
            || filter_var($managerEmail, FILTER_VALIDATE_EMAIL) === false
        ) {
            $this->addError(
                'form',
                'Адрес получателя не настроен или указан неверно. '
                    .'Пожалуйста, свяжитесь с нами по телефону.'
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
        $contactPhone = trim(
            (string) config('contacts.contact_phone', '')
        );

        $contactEmail = trim(
            (string) config('contacts.contact_email', '')
        );

        $phoneDigits = preg_replace(
            '/\D+/',
            '',
            $contactPhone
        ) ?? '';

        $phoneHref = $phoneDigits !== ''
            ? '+'.$phoneDigits
            : '';

        // Оформление карточек относится к отображению,
        // поэтому не хранится в настройках контактов.
        $iconClasses = [
            'vk' => 'bg-[#0077ff] text-white',
            'telegram' => 'bg-[#229ed9] text-white',
            'rutube' => 'bg-[#100943] text-white',
            'max' => 'bg-[#596cff] text-white',
            'email' => 'bg-[#a96c62] text-white',
        ];

        $links = array_merge(
            config('contacts.socials', []),
            config('contacts.messengers', [])
        );

        $socials = [];

        foreach ($links as $link) {
            $type = (string) ($link['key'] ?? '');
            $href = trim((string) ($link['url'] ?? ''));

            // Не показываем карточки без ссылки или типа.
            if ($type === '' || $href === '') {
                continue;
            }

            $socials[] = [
                'type' => $type,
                'name' => (string) ($link['label'] ?? $type),
                'description' => (string) (
                    $link['description'] ?? ''
                ),
                'href' => $href,
                'iconClass' => $iconClasses[$type]
                    ?? 'bg-bed-blush text-bed-rose-dark',
            ];
        }

        if ($contactEmail !== '') {
            $socials[] = [
                'type' => 'email',
                'name' => $contactEmail,
                'description' => 'Написать на почту',
                'href' => 'mailto:'.$contactEmail,
                'iconClass' => $iconClasses['email'],
            ];
        }

        return view('components.bedding.contacts', [
            'contactPhone' => $contactPhone,
            'phoneHref' => $phoneHref,
            'contactEmail' => $contactEmail,
            'socials' => $socials,
        ]);
    }
}
