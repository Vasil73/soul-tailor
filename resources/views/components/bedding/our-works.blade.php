<div>

    @php
        ($works = config('works', []));
    @endphp

    <section id="works" class="scroll-mt-[90px] bg-bed-linen py-20 md:py-28" aria-labelledby="works-heading">
        <div class="bed-container">
            {{-- Заголовок раздела --}}
            <div class="mb-12 grid gap-6
                       lg:grid-cols-[minmax(0,1fr)_420px]
                       lg:items-end">
                <div>
                    <p class="bed-kicker">
                        Наши работы
                    </p>

                    <h2 id="works-heading" class="bed-title mt-4 max-w-[780px]">
                        Из лучшего турецкого хлопка
                    </h2>
                </div>

                <p class="max-w-[420px] text-[15px] leading-7
                           text-bed-muted lg:justify-self-end">
                    Каждый комплект создаём индивидуально: помогаем подобрать
                    ткань, оттенок, размеры и подходящую комплектацию.
                </p>
            </div>

            {{-- Карточки работ --}}
            {{-- Карточки работ --}}
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($works as $work)
                    <article wire:key="work-{{ $loop->index }}" class="fabric-card group relative isolate flex min-h-[520px]
                                           overflow-hidden rounded-[28px]
                                           border border-white/30 bg-bed-cocoa
                                           shadow-[0_18px_50px_rgba(64,54,51,0.16)]"
                        aria-labelledby="work-title-{{ $loop->iteration }}">
                        {{-- Изображение работы --}}
                        <img src="{{ asset($work['image']) }}" alt="{{ $work['alt'] }}" width="1200" height="900"
                            loading="lazy" decoding="async" class="absolute inset-0 -z-30 h-full w-full
                                               object-cover object-center
                                               transition-transform duration-700 ease-out
                                               group-hover:scale-[1.05]">

                        {{-- Мягкое затемнение --}}
                        <div class="pointer-events-none absolute inset-0 -z-20
                                               bg-[#403633]/15 transition-colors duration-500
                                               group-hover:bg-[#403633]/25" aria-hidden="true"></div>

                        {{-- Градиент --}}
                        <div class="pointer-events-none absolute inset-0 -z-10
                                               bg-gradient-to-b from-[#302724]/35
                                               via-[#403633]/10 to-[#302724]/95" aria-hidden="true"></div>

                        {{-- Прозрачная кнопка на всю карточку --}}
                        <button type="button" wire:click="openWork({{ $loop->index }})" wire:loading.attr="disabled"
                            aria-label="Открыть фотографию работы «{{ $work['title'] }}»" class="absolute inset-0 z-10 cursor-zoom-in rounded-[28px]
                                               focus:outline-none
                                               focus-visible:ring-4
                                               focus-visible:ring-inset
                                               focus-visible:ring-white/80">
                            {{-- <span class="sr-only">
                                Открыть фотографию работы «{{ $work['title'] }}»
                            </span> --}}
                        </button>

                        {{-- Содержимое карточки --}}
                        <div class="pointer-events-none relative z-20
                                               flex min-h-[520px] w-full flex-col
                                               justify-between p-5 md:p-7">
                            <div class="flex items-start justify-between gap-4">
                                <span class="rounded-full border border-white/30
                                                       bg-black/15 px-4 py-2 text-[11px]
                                                       font-bold uppercase tracking-[0.14em]
                                                       text-white backdrop-blur-md">
                                    Выполненная работа
                                </span>
                            </div>

                            <div class="max-w-[520px]">
                                <h3 id="work-title-{{ $loop->iteration }}" class="text-[28px] font-bold leading-tight
                                                       tracking-[-0.035em] text-white
                                                       drop-shadow-[0_2px_12px_rgba(0,0,0,0.35)]
                                                       sm:text-[30px]">
                                    {{ $work['title'] }}
                                </h3>

                                <p class="mt-3 max-w-[540px] text-[14px]
                                                       leading-6 text-white/85
                                                       drop-shadow-[0_2px_8px_rgba(0,0,0,0.35)]
                                                       sm:text-[15px]">
                                    {{ $work['description'] }}
                                </p>

                                <div class="mt-6 flex items-center justify-between
                                                       gap-4 border-t border-white/30 pt-5">
                                    <span class="text-[12px] font-bold uppercase
                                                           tracking-[0.13em] text-white/75">
                                        Индивидуальный пошив
                                    </span>

                                    {{-- Эта ссылка работает независимо от карточки --}}
                                    <a href="#order" aria-label="Рассчитать стоимость комплекта «{{ $work['title'] }}»"
                                        class="pointer-events-auto relative z-30 flex
                                                           h-12 w-12 shrink-0 items-center
                                                           justify-center rounded-full
                                                           border border-white/40 bg-white/85
                                                           text-bed-cocoa shadow-md backdrop-blur-md
                                                           transition duration-300
                                                           hover:scale-105
                                                           hover:border-bed-rose
                                                           hover:bg-bed-rose
                                                           hover:text-white
                                                           focus:outline-none
                                                           focus-visible:ring-2
                                                           focus-visible:ring-white
                                                           focus-visible:ring-offset-2
                                                           focus-visible:ring-offset-bed-cocoa">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            aria-hidden="true">
                                            <path d="M5 12h14" />
                                            <path d="m13 6 6 6-6 6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
    </section>
    @if ($selectedWork)
        @teleport('body')
        <div wire:key="work-photo-modal" wire:click.self="closeWork" x-on:keydown.escape.window="$wire.closeWork()"
            role="dialog" aria-modal="true" aria-labelledby="work-modal-title" class="fixed inset-0 z-[100] flex items-center justify-center
                                           bg-black/85 p-4 backdrop-blur-sm
                                           sm:p-6 lg:p-10">
            <div class="relative flex max-h-[95vh] w-full max-w-6xl
                                               flex-col overflow-hidden rounded-[24px]
                                               bg-[#201c1a]
                                               shadow-[0_30px_100px_rgba(0,0,0,0.55)]">
                {{-- Кнопка закрытия --}}
                <button type="button" wire:click="closeWork" aria-label="Закрыть фотографию" class="absolute right-3 top-3 z-20 flex h-11 w-11
                                                   items-center justify-center rounded-full
                                                   border border-white/30 bg-black/50 text-white
                                                   shadow-lg backdrop-blur-md
                                                   transition duration-200
                                                   hover:scale-105 hover:bg-white hover:text-black
                                                   focus:outline-none focus-visible:ring-2
                                                   focus-visible:ring-white">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>

                {{-- Увеличенное изображение --}}
                <div class="flex min-h-0 flex-1 items-center
                                                   justify-center overflow-hidden bg-black">
                    <img src="{{ asset($selectedWork['image']) }}" alt="{{ $selectedWork['alt'] }}"
                        class="max-h-[78vh] w-full object-contain">
                </div>

                {{-- Подпись --}}
                <div class="border-t border-white/10 px-5 py-4 sm:px-7">
                    <h3 id="work-modal-title" class="text-xl font-bold text-white sm:text-2xl">
                        {{ $selectedWork['title'] }}
                    </h3>

                    @if ($selectedWork['description'])
                        <p class="mt-2 max-w-3xl text-sm leading-6 text-white/70">
                            {{ $selectedWork['description'] }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
        @endteleport
    @endif
</div>
