@props ([
    $sent => false
]);

<header x-data="{ mobileMenuOpened: false }" class="fixed inset-x-0 top-0 z-50 border-b border-[#dacdc5]/70
           bg-[#fcf9f5]/90 text-bed-ink shadow-[0_8px_35px_rgba(87,72,68,0.06)]
           backdrop-blur-xl">
    <div class="bed-container flex h-[80px] items-center justify-between">
        <a href="{{ route('home') }} :active=" request()->routeIs('home')">
            {{ __('Главная') }}
            <span class="flex h-11 w-11 items-center justify-center rounded-full
                       bg-bed-blush text-lg font-bold text-bed-cocoa
                       shadow-sm transition group-hover:bg-bed-rose
                       group-hover:text-white">
                B
            </span>

            <span class="leading-tight">
                <span class="block text-[17px] font-bold tracking-[-0.025em]">
                    Bedding Atelier
                </span>

                <span class="mt-0.5 block text-[10px] font-semibold uppercase
                           tracking-[0.16em] text-bed-muted">
                    Индивидуальный пошив
                </span>
            </span>
        </a>

        <nav class="hidden items-center gap-8 text-[14px] font-semibold lg:flex" aria-label="Основная навигация">
            <a href="#fabrics" class="text-bed-muted transition hover:text-bed-rose-dark">
                Коллекции
            </a>

            <a href="#sizes" class="text-bed-muted transition hover:text-bed-rose-dark">
                Индивидуальный пошив
            </a>

            <a href="#process" class="text-bed-muted transition hover:text-bed-rose-dark">
                Как мы работаем
            </a>

            {{-- <a href="{{ route('contacts') }} :active=" request()->routeIs('contacts')" class="text-bed-muted
                transition
                hover:text-bed-rose-dark">
                {{ __('Контакты') }}
            </a> --}}
        </nav>

        <div class="flex items-center gap-3">
            <a href="#order" class="hidden min-h-11 items-center justify-center rounded-full
                       bg-bed-rose px-6 text-[14px] font-bold text-white
                       shadow-[0_10px_25px_rgba(151,111,103,0.18)]
                       transition hover:bg-bed-rose-dark sm:inline-flex">
                Получить расчёт
            </a>

            <button type="button" x-on:click="mobileMenuOpened = !mobileMenuOpened"
                x-bind:aria-expanded="mobileMenuOpened" aria-controls="mobile-navigation" aria-label="Открыть меню"
                class="flex h-11 w-11 items-center justify-center rounded-full
                       border border-[#d8cbc4] bg-white/60 text-bed-cocoa
                       transition hover:border-bed-rose lg:hidden">
                <svg x-show="!mobileMenuOpened" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round" />
                </svg>

                <svg x-cloak x-show="mobileMenuOpened" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="m6 6 12 12M18 6 6 18" stroke-linecap="round" />
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-navigation" x-cloak x-show="mobileMenuOpened" x-transition.opacity.duration.200ms
        x-on:click.outside="mobileMenuOpened = false"
        class="border-t border-[#e2d8d1] bg-bed-milk px-6 pb-6 pt-2 lg:hidden">
        <nav class="flex flex-col" aria-label="Мобильная навигация">
            @foreach ([
                    ['href' => '#fabrics', 'label' => 'Коллекции'],
                    ['href' => '#sizes', 'label' => 'Индивидуальный пошив'],
                    ['href' => '#process', 'label' => 'Как мы работаем'],
                    ['href' => '#order', 'label' => 'Оставить заявку'],
                ] as $item)
                <a href="{{ $item['href'] }}" x-on:click="mobileMenuOpened = false" class="border-b border-[#e5dbd5] py-4 font-semibold
                                                   text-bed-muted last:border-b-0">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <a href="#order" x-on:click="mobileMenuOpened = false" class="mt-3 flex min-h-12 items-center justify-center rounded-full
                   bg-bed-rose px-6 font-bold text-white">
            Получить расчёт
        </a>
    </div>
</header>