$@php
    $contactPhone = '+7 (831) 000-00-00';
    $phoneHref = '+' . preg_replace('/\D/', '', $contactPhone);

    $contactEmail = 'info@example.ru';

    $socials = [
        [
            'type' => 'vk',
            'name' => 'ВКонтакте',
            'description' => 'Перейти в сообщество',
            'href' => 'https://vk.com/your_page',
            'iconClass' => 'bg-[#0077ff] text-white',
        ],
        [
            'type' => 'telegram',
            'name' => 'Telegram',
            'description' => 'Написать в мессенджере',
            'href' => 'https://t.me/your_username',
            'iconClass' => 'bg-[#229ed9] text-white',
        ],
        [
            'type' => 'rutube',
            'name' => 'RUTUBE',
            'description' => 'Мы на RUTUBE',
            'href' => 'https://rutube.ru/channel/your_channel/',
            'iconClass' => 'bg-[#100943] text-white',
        ],
        [
            'type' => 'max',
            'name' => 'MAX',
            'description' => 'Написать в мессенджере',
            'href' => 'https://max.ru/your_username',
            'iconClass' => 'bg-[#596cff] text-white',
        ],
        [
            'type' => 'email',
            'name' => $contactEmail,
            'description' => 'Написать на почту',
            'href' => 'mailto:' . $contactEmail,
            'iconClass' => 'bg-[#a96c62] text-white',
        ],
    ];
@endphp

<section class="relative mb-3 overflow-hidden
           border border-[#d8c4ba] bg-[#eadbd4]
            shadow-[0_20px_60px_rgba(87,72,68,0.10)]
           sm:p-8 lg:p-26">
    <div class="pointer-events-none absolute -right-20 -top-24
               h-[280px] w-[280px] rounded-full
               bg-white/50 blur-[70px]" aria-hidden="true"></div>

    <div class="relative">
        <div class="flex h-14 w-14 items-center justify-center
                   rounded-2xl bg-white text-bed-rose-dark
                   shadow-[0_10px_30px_rgba(87,72,68,0.10)]">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2
                       19.79 19.79 0 0 1-8.63-3.07
                       19.5 19.5 0 0 1-6-6
                       19.79 19.79 0 0 1-3.07-8.67
                       A2 2 0 0 1 4.11 2h3
                       a2 2 0 0 1 2 1.72
                       12.84 12.84 0 0 0 .7 2.81
                       2 2 0 0 1-.45 2.11L8.09 9.91
                       a16 16 0 0 0 6 6l1.27-1.27
                       a2 2 0 0 1 2.11-.45
                       12.84 12.84 0 0 0 2.81.7
                       A2 2 0 0 1 22 16.92z" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>

        <div class="flex justify-between text-wrap">
            <div class="mr-[5px]">
<p class="text-xs font-bold uppercase tracking-[0.16em]
                           text-[#a96c62]">
                    Где мы находимся
                </p>

                <h3 class="mt-3 text-[26px] font-bold leading-tight
                           tracking-tight text-[#292522]">
                    Мы находимся в Нижнем Новгороде
                </h3>

                <p class="mt-3 text-sm leading-6 text-[#72665f]">
                    Свяжитесь с нами, чтобы обсудить размеры, ткань
                    и детали вашего комплекта.
                </p>

</div>

<div class="">
<h3 class="mt-6 w-[100%] text-[27px] font-bold
                   leading-[1.15] tracking-[-0.035em]
                   text-bed-ink sm:text-[30px]">
            Свяжитесь с нами удобным способом
        </h3>

        <p class="mt-4 text-[15px]
                   leading-7 text-bed-muted">
            Ответим на вопросы, поможем подобрать ткань,
            рассчитаем стоимость и уточним детали заказа.
        </p>
</div>
        </div>

<form class="mt-7 grid grid-cols-1 items-start gap-4 lg:grid-cols-3">

    {{-- Телефон --}}
    <div class="min-w-0">
        <a
            href="tel:{{ $phoneHref }}"
            class="group flex min-h-[82px] w-full items-center gap-4
                   rounded-2xl border border-white/80 bg-white/75
                   px-4 py-3
                   shadow-[0_10px_30px_rgba(87,72,68,0.07)]
                   transition duration-200
                   hover:border-bed-rose/40 hover:bg-white
                   focus:outline-none focus-visible:ring-2
                   focus-visible:ring-bed-rose-dark
                   focus-visible:ring-offset-2"
        >
            <span
                class="flex h-11 w-11 shrink-0 items-center justify-center
                       rounded-xl bg-bed-blush text-bed-rose-dark
                       transition
                       group-hover:bg-bed-rose
                       group-hover:text-white"
            >
                <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    aria-hidden="true"
                >
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2
                           19.79 19.79 0 0 1-8.63-3.07
                           19.5 19.5 0 0 1-6-6
                           19.79 19.79 0 0 1-3.07-8.67
                           A2 2 0 0 1 4.11 2h3
                           a2 2 0 0 1 2 1.72
                           12.84 12.84 0 0 0 .7 2.81
                           2 2 0 0 1-.45 2.11L8.09 9.91
                           a16 16 0 0 0 6 6l1.27-1.27
                           a2 2 0 0 1 2.11-.45
                           12.84 12.84 0 0 0 2.81.7
                           A2 2 0 0 1 22 16.92z"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </span>

            <span class="min-w-0 flex-1">
                <span
                    class="block text-[12px] font-bold uppercase
                           tracking-[0.12em] text-bed-muted"
                >
                    Позвонить
                </span>

                <span
                    class="mt-0.5 block truncate text-[18px] font-bold
                           tracking-[-0.025em] text-bed-rose-dark
                           sm:text-[20px] xl:text-[22px]"
                >
                    {{ $contactPhone }}
                </span>
            </span>
        </a>
        <p class="text-[13px] leading-5 text-bed-muted pt-5">
            Принимаем обращения ежедневно с 9:00 до 20:00
        </p>
    </div>

    {{-- Имя --}}
    <div class="min-w-0">
        <label
            class="group flex min-h-[82px] w-full items-center gap-4
                   rounded-2xl border border-white/80 bg-white/75
                   px-4 py-3
                   shadow-[0_10px_30px_rgba(87,72,68,0.07)]
                   transition duration-200
                   hover:border-bed-rose/40 hover:bg-white
                   focus-within:border-bed-rose
                   focus-within:bg-white
                   focus-within:ring-2
                   focus-within:ring-bed-rose-dark
                   focus-within:ring-offset-2"
        >
            <span
                class="flex h-11 w-11 shrink-0 items-center justify-center
                       rounded-xl bg-bed-blush text-bed-rose-dark"
            >
                <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <path d="M20 21a8 8 0 0 0-16 0" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
            </span>

            <span class="min-w-0 flex-1">
                <span
                    class="block text-[12px] font-bold uppercase
                           tracking-[0.12em] text-bed-muted"
                >
                    Ваше имя
                </span>

                <input
                    type="text"
                    name="name"
                    wire:model.blur="name"
                    autocomplete="name"
                    placeholder="Введите имя"
                    class="mt-0.5 block w-full min-w-0 border-0
                           bg-transparent p-0 text-[17px] font-semibold
                           text-bed-ink
                           placeholder:font-normal
                           placeholder:text-bed-muted/70
                           focus:border-transparent focus:outline-none
                           focus:ring-0"
                >
            </span>
        </label>

        @error('name')
            <p class="mt-2 px-1 text-[13px] leading-5 text-red-700">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Электронная почта --}}
    <div class="min-w-0">
        <label
            class="group flex min-h-[82px] w-full items-center gap-4
                   rounded-2xl border border-white/80 bg-white/75
                   px-4 py-3
                   shadow-[0_10px_30px_rgba(87,72,68,0.07)]
                   transition duration-200
                   hover:border-bed-rose/40 hover:bg-white
                   focus-within:border-bed-rose
                   focus-within:bg-white
                   focus-within:ring-2
                   focus-within:ring-bed-rose-dark
                   focus-within:ring-offset-2"
        >
            <span
                class="flex h-11 w-11 shrink-0 items-center justify-center
                       rounded-xl bg-bed-blush text-bed-rose-dark"
            >
                <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <rect x="3" y="5" width="18" height="14" rx="2" />
                    <path d="m3 7 9 6 9-6" />
                </svg>
            </span>

            <span class="min-w-0 flex-1">
                <span
                    class="block text-[12px] font-bold uppercase
                           tracking-[0.12em] text-bed-muted"
                >
                    Электронная почта
                </span>

                <input
                    type="email"
                    name="email"
                    wire:model.blur="email"
                    autocomplete="email"
                    inputmode="email"
                    placeholder="mail@example.ru"
                    class="mt-0.5 block w-full min-w-0 border-0
                           bg-transparent p-0 text-[17px] font-semibold
                           text-bed-ink
                           placeholder:font-normal
                           placeholder:text-bed-muted/70
                           focus:border-transparent focus:outline-none
                           focus:ring-0"
                >
            </span>
        </label>
        {{-- Кнопка и сообщения --}}

{{-- Кнопка отправки --}}
    <div class="mt-5 flex w-100 flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <button
            type="submit"
            wire:loading.attr="disabled"
            wire:target="submit"
            class="group inline-flex min-h-[54px] w-full items-center
                   justify-center gap-3 rounded-2xl
                   bg-bed-rose-dark px-7 py-3
                   text-[15px] font-bold text-white
                   shadow-[0_12px_30px_rgba(169,108,98,0.25)]
                   transition duration-200
                   hover:-translate-y-0.5 hover:bg-bed-rose
                   hover:shadow-[0_16px_34px_rgba(169,108,98,0.32)]
                   focus:outline-none focus-visible:ring-2
                   focus-visible:ring-bed-rose-dark
                   focus-visible:ring-offset-2
                   disabled:pointer-events-none disabled:opacity-60
                   sm:w-auto"
        >
            {{-- Обычное состояние --}}
            <span
                wire:loading.remove
                wire:target="submit"
                class="inline-flex items-center gap-3"
            >
                Отправить

                <svg
                    class="h-5 w-5 transition-transform duration-200
                           group-hover:translate-x-1"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <path d="m22 2-7 20-4-9-9-4Z" />
                    <path d="M22 2 11 13" />
                </svg>
            </span>

            {{-- Отправка --}}
            <span
                wire:loading.flex
                wire:target="submit"
                class="items-center gap-3"
            >
                <svg
                    class="h-5 w-5 animate-spin"
                    viewBox="0 0 24 24"
                    fill="none"
                    aria-hidden="true"
                >
                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="9"
                        stroke="currentColor"
                        stroke-width="3"
                    />

                    <path
                        class="opacity-90"
                        d="M21 12a9 9 0 0 0-9-9"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linecap="round"
                    />
                </svg>

                Отправляем…
            </span>
        </button>
    </div>

    {{-- Сообщение об успешной отправке --}}
    @if (session()->has('success'))
        <div
            role="status"
            class="mt-4 flex items-start gap-3 rounded-2xl
                   border border-emerald-200 bg-emerald-50
                   px-4 py-3 text-sm leading-6 text-emerald-800"
        >
            <svg
                class="mt-0.5 h-5 w-5 shrink-0"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <path d="M20 6 9 17l-5-5" />
            </svg>

            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Общая ошибка отправки --}}
    @error('form')
        <div
            role="alert"
            class="mt-4 flex items-start gap-3 rounded-2xl
                   border border-red-200 bg-red-50
                   px-4 py-3 text-sm leading-6 text-red-700"
        >
            <svg
                class="mt-0.5 h-5 w-5 shrink-0"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <circle cx="12" cy="12" r="9" />
                <path d="M12 8v5" />
                <path d="M12 17h.01" />
            </svg>

            <span>{{ $message }}</span>
        </div>
    @enderror


        @error('email')
            <p class="mt-2 px-1 text-[13px] leading-5 text-red-700">
                {{ $message }}
            </p>
        @enderror
    </div>
    {{-- <p class="mt-3 text-[13px] leading-5 text-bed-muted">
            Принимаем обращения ежедневно с 9:00 до 20:00
        </p> --}}
</form>



        <div class="mt-8">
            <p class="text-[12px] font-bold uppercase
                       tracking-[0.14em] text-bed-rose-dark">
                Социальные сети и мессенджеры
            </p>

            <div
    class="mt-4 grid grid-cols-1 gap-3
           sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-5"role="list">
                @foreach ($socials as $social)
               <a
    href="{{ $social['href'] }}"
    @if ($social['type'] !== 'email')
        target="_blank"
        rel="noopener noreferrer"
    @endif
    aria-label="{{ $social['name'] }} — {{ $social['description'] }}"
    role="listitem"
    class="group flex min-h-[68px] min-w-0 items-center gap-4
           rounded-2xl border border-white/80
           bg-white/75 px-4 py-3
           shadow-[0_8px_24px_rgba(87,72,68,0.06)]
           transition duration-200
           hover:-translate-y-0.5
           hover:border-bed-rose/40 hover:bg-white
           hover:shadow-[0_12px_30px_rgba(87,72,68,0.10)]
           focus:outline-none focus-visible:ring-2
           focus-visible:ring-bed-rose-dark
           focus-visible:ring-offset-2">
                    <span @class([ 'flex h-11 w-11 shrink-0 items-center' , 'justify-center rounded-xl shadow-sm' ,
                        $social['iconClass'], ])>
                        @switch($social['type'])
                        @case('vk')
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M15.07 2H8.93C3.33 2 2 3.33 2 8.93v6.14
                                               C2 20.67 3.33 22 8.93 22h6.14
                                               C20.67 22 22 20.67 22 15.07V8.93
                                               C22 3.33 20.67 2 15.07 2Zm3.08 14.27h-1.46
                                               c-.55 0-.72-.44-1.7-1.42
                                               -.85-.82-1.22-.93-1.43-.93
                                               -.29 0-.37.08-.37.48v1.3
                                               c0 .35-.11.56-1.03.56
                                               -1.52 0-3.2-.92-4.38-2.62
                                               -1.77-2.49-2.26-4.36-2.26-4.74
                                               0-.21.08-.4.48-.4h1.46
                                               c.37 0 .51.17.65.56
                                               .72 2.08 1.93 3.9 2.43 3.9
                                               .19 0 .27-.09.27-.58v-2.26
                                               c-.06-1.04-.61-1.13-.61-1.5
                                               0-.18.15-.36.37-.36h2.3
                                               c.31 0 .42.17.42.53v3.05
                                               c0 .33.14.44.24.44
                                               .19 0 .35-.11.7-.46
                                               1.09-1.22 1.86-3.1 1.86-3.1
                                               .1-.21.27-.4.64-.4h1.46
                                               c.44 0 .54.23.44.54
                                               -.18.84-1.94 3.33-1.94 3.33
                                               -.16.25-.22.37 0 .66
                                               .16.21.68.67 1.03 1.08
                                               .64.73 1.13 1.34 1.26 1.76
                                               .15.42-.08.63-.48.63Z" />
                        </svg>
                        @break

                        @case('telegram')
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M21.6 3.2 18.4 20
                                               c-.24 1.18-.88 1.47-1.78.91
                                               l-4.87-3.59-2.35 2.26
                                               c-.26.26-.48.48-.98.48
                                               l.35-4.96 9.02-8.15
                                               c.39-.35-.09-.55-.61-.2
                                               L6.03 13.77l-4.8-1.5
                                               c-1.04-.33-1.06-1.04.22-1.54
                                               L20.2 3.5c.87-.32 1.63.2 1.4 1.7Z" />
                        </svg>
                        @break

                        @case('rutube')
    <svg
        class="h-6 w-6"
        viewBox="0 0 24 24"
        fill="none"
        aria-hidden="true"
    >
        <rect
            x="2.5"
            y="5"
            width="19"
            height="14"
            rx="4"
            stroke="currentColor"
            stroke-width="2"
        />

        <path
            d="M10 9.25v5.5L15 12l-5-2.75Z"
            fill="currentColor"
        />

        <circle
            cx="19"
            cy="6"
            r="2"
            fill="#ff4b55"
        />
    </svg>
@break

                        @case('max')
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M7.5 17V7.5l4.5 5 4.5-5V17" />

                            <path d="M5 3.5h14a2.5 2.5 0 0 1 2.5 2.5v10
                                               a2.5 2.5 0 0 1-2.5 2.5h-5.7
                                               L9 21v-2.5H5A2.5 2.5 0 0 1 2.5 16V6
                                               A2.5 2.5 0 0 1 5 3.5Z" />
                        </svg>
                        @break

                        @case('email')
    <svg
        class="h-6 w-6"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        aria-hidden="true"
    >
        <rect x="3" y="5" width="18" height="14" rx="2" />
        <path d="m3 7 9 6 9-6" />
    </svg>
@break

                        @default
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7
                                               a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4Z" />
                        </svg>
                        @endswitch
                    </span>

                    <span class="min-w-0 flex-1">
                        <span class="block text-[15px] font-bold
                                       leading-5 text-bed-ink
                                       transition group-hover:text-bed-rose-dark">
                            {{ $social['name'] }}
                        </span>

                        <span class="mt-0.5 block text-[13px]
                                       leading-5 text-bed-muted">
                            {{ $social['description'] }}
                        </span>
                    </span>

                    <svg class="h-5 w-5 shrink-0 text-bed-muted
                                   transition duration-200
                                   group-hover:translate-x-1
                                   group-hover:text-bed-rose-dark" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
