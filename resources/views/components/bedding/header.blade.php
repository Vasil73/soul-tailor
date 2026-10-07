@php
    $phone = config('contact.phone');

    $messengers = collect(config('contact.messengers', []))
        ->filter(fn(array $item): bool => filled($item['url'] ?? null));

    $socials = collect(config('contact.socials', []))
        ->filter(fn(array $item): bool => filled($item['url'] ?? null));
@endphp

<header x-data="{
        mobileMenuOpened: false,
        contactsOpened: false,

        openContacts() {
            this.mobileMenuOpened = false;
            this.contactsOpened = true;

            this.$nextTick(() => this.$refs.contactName.focus());
        },

        formatPhone(event) {
            const input = event.target;
            const raw = input.value.replace(/\D/g, '');

            if (!raw) {
                input.value = '';
                return;
            }

            let digits = raw.startsWith('8')
                ? '7' + raw.slice(1)
                : raw.startsWith('7')
                    ? raw
                    : '7' + raw;

            digits = digits.slice(0, 11);

            const number = digits.slice(1);

            let formatted = '+7';

            if (number.length > 0) {
                formatted += ' (' + number.slice(0, 3);
            }

            if (number.length >= 3) {
                formatted += ')';
            }

            if (number.length > 3) {
                formatted += ' ' + number.slice(3, 6);
            }

            if (number.length > 6) {
                formatted += '-' + number.slice(6, 8);
            }

            if (number.length > 8) {
                formatted += '-' + number.slice(8, 10);
            }

            input.value = formatted;
        }
    }" x-on:keydown.escape.window="
        contactsOpened = false;
        mobileMenuOpened = false;
    " class="inset-x-0 fixed top-0 z-50 border-b border-[#dacdc5]/70
           bg-[#fcf9f5]/95 text-[#292522]
           shadow-[0_8px_35px_rgba(87,72,68,0.06)]
           backdrop-blur-xl">
    <div class="mx-auto flex h-[80px] max-w-[1320px] items-center justify-between px-6 lg:px-10">

        <a href="{{ route('home') }}" class="group flex shrink-0 items-center"
            aria-label="Bedding Atelier — перейти на главную страницу" x-on:click="
            contactsOpened = false;
            mobileMenuOpened = false;
        ">
            <img src="{{ asset('images/logo/logo-b_a.png') }}" alt="Bedding Atelier" width="320" height="96" class="h-auto w-[180px] object-contain
                   transition duration-300
                   group-hover:opacity-90
                   sm:w-[210px] xl:w-[230px]" fetchpriority="high">
        </a>

        {{-- Навигация для больших экранов --}}
        <nav class="hidden items-center gap-8 text-[14px] font-semibold lg:flex" aria-label="Основная навигация">

            <a href="{{ route('home') }}" class="text-[#72665f] transition hover:text-[#a96c62]">
                {{ __('Главная') }}
            </a>

            <a href="{{ route('fabrics') }}" class="text-[#72665f] transition hover:text-[#a96c62]">
                {{ __('Ткани') }}
            </a>

            <a href="{{ route('our-works') }}" class="text-[#72665f] transition hover:text-[#a96c62]">
                {{ __('Наши работы') }}
            </a>

            <a href="{{ route('sizes') }}" class="text-[#72665f] transition hover:text-[#a96c62]">
                {{ __('Размеры') }}
            </a>

            <a href="{{ route('prcess') }}" class="text-[#72665f] transition hover:text-[#a96c62]">
                {{ __('Как мы работаем') }}
            </a>

            <a href="{{ route('contacts') }}" class="text-bed-muted transition
                hover:text-bed-rose-dark">
                {{ __('Контакты') }}
            </a>

            {{-- <a href="{{ route('delivery') }}" class="text-bed-muted transition
                            hover:text-bed-rose-dark">
                {{ __('Доставка') }}
            </a> --}}

        </nav>

        <div class="flex items-center gap-3">

            <a href="{{ route('order-form') }}" class="hidden min-h-11 items-center justify-center
                       rounded-full bg-[#ad766c] px-6 text-[13px]
                       font-bold text-white transition hover:bg-[#905d55]
                       sm:inline-flex">
                {{ __('Рассчитать стоимость') }}
            </a>

            <button type="button" x-on:click="
                    mobileMenuOpened = !mobileMenuOpened;
                    contactsOpened = false;
                " x-bind:aria-expanded="mobileMenuOpened.toString()" aria-controls="header-mobile-menu"
                aria-label="Открыть или закрыть меню" class="flex h-11 w-11 items-center justify-center
                       rounded-full border border-[#dacdc5]
                       text-[#685048] lg:hidden">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" aria-hidden="true">
                    <path x-show="!mobileMenuOpened" d="M4 7h16M4 12h16M4 17h16" />

                    <path x-show="mobileMenuOpened" x-cloak d="M5 5l14 14M19 5 5 19" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Мобильное меню --}}
    <nav id="header-mobile-menu" x-show="mobileMenuOpened" x-cloak x-transition aria-label="Мобильная навигация" class="border-t border-[#dacdc5] bg-[#fcf9f5]
               px-6 py-5 shadow-xl lg:hidden">

        <div class="mx-auto flex max-w-[1320px] flex-col gap-4 text-sm font-semibold">

            <a href="{{ route('home') }}" x-on:click="mobileMenuOpened = false" class="py-1">
                {{ __('Главная') }}
            </a>

            <a href="{{ route('fabrics') }}" x-on:click="mobileMenuOpened = false" class="py-1">
                {{ __('Ткани') }}
            </a>

            <a href="{{ route('our-works') }}" x-on:click="mobileMenuOpened = false" class="py-1">
                {{ __('Наши работы') }}
            </a>

            <a href="{{ route('sizes') }}" x-on:click="mobileMenuOpened = false" class="py-1">
                {{ __('Размеры') }}
            </a>

            <a href="{{ route('prcess') }}" x-on:click="mobileMenuOpened = false" class="py-1">
                {{ __('Как мы работаем') }}
            </a>

            {{-- <a href="{{ route('delivery') }}" x-on:click="mobileMenuOpened = false" class="py-1">
                {{ __('Доставка') }}
            </a> --}}

            <a href="{{ route('contacts') }}" x-on:click="mobileMenuOpened = false" class="py-1">
                {{ __('Контакты') }}
            </a>

            <a href="{{ route('order-form') }}" x-on:click="mobileMenuOpened = false" class="mt-2 inline-flex min-h-12 items-center
                       justify-center rounded-full bg-[#ad766c]
                       px-6 text-white">
                {{ __('Рассчитать стоимость') }}
            </a>
        </div>
    </nav>

    {{-- Затемнение страницы --}}
    <div x-show="contactsOpened" x-cloak x-transition.opacity x-on:click="contactsOpened = false" class="fixed inset-x-0 bottom-0 top-[80px]
               bg-[#1d1816]/60" aria-hidden="true"></div>
    </div>
</header>