<div>
    @php
        $steps = config('how-it-works', []);
    @endphp

    <section id="process" class="relative scroll-mt-[90px] overflow-hidden
               bg-[linear-gradient(180deg,#f8f2ed_0%,#f5eee8_100%)]
               py-20 md:py-28" aria-labelledby="process-heading">
        {{-- Декоративные фоновые элементы --}}
        <div class="pointer-events-none absolute -left-32 top-20
                   h-72 w-72 rounded-full bg-bed-blush/20 blur-3xl" aria-hidden="true"></div>

        <div class="pointer-events-none absolute -right-32 bottom-10
                   h-80 w-80 rounded-full bg-white/60 blur-3xl" aria-hidden="true"></div>

        <div class="bed-container relative">
            {{-- Заголовок раздела --}}
            <div class="grid gap-7

                       lg:items-end">
                <div>
                    <p class="bed-kicker">
                        Как мы работаем
                    </p>

                    <h2 id="process-heading" class="bed-title mt-4">
                        Четыре спокойных шага до готового комплекта
                    </h2>
                </div>

                <p class="max-w-[560px] text-[16px] leading-7
                           text-bed-muted lg:justify-self-end">
                    Помогаем на каждом этапе: подбираем ткань, проверяем размеры,
                    согласовываем детали и контролируем качество пошива.
                </p>
            </div>

            {{-- Симметрично расположенная ссылка --}}
            <div class="mt-10 mb-5 flex items-center justify-center gap-4 sm:gap-6">
                <span class="mb-20 h-px w-8 bg-[#d7c8bf]
                           sm:w-20 lg:w-32" aria-hidden="true"></span>

                {{-- <a href="{{ route('our-works') }}" class="group inline-flex min-h-12 shrink-0
                           items-center justify-center gap-3
                           rounded-full border border-bed-rose/30
                           bg-bed-rose-dark px-6 py-3
                           text-[14px] font-bold text-white
                           shadow-[0_12px_30px_rgba(87,72,68,0.16)]
                           transition duration-300
                           hover:-translate-y-0.5
                           hover:shadow-[0_18px_38px_rgba(87,72,68,0.23)]
                           focus:outline-none
                           focus-visible:ring-2
                           focus-visible:ring-bed-rose-dark
                           focus-visible:ring-offset-4
                           focus-visible:ring-offset-[#f5eee8]
                           sm:px-8">
                    <span>{{ __('Наши работы') }}</span>

                    <svg class="h-5 w-5 transition-transform duration-300
                               group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14" />
                        <path d="m13 6 6 6-6 6" />
                    </svg>
                </a> --}}

                <span class="h-px w-8 bg-[#d7c8bf]
                           sm:w-20 lg:w-32" aria-hidden="true"></span>
                </span>
            </div>

            {{-- Этапы работы --}}
            <div class="relative mt-14 md:mt-16">
                {{-- Соединительная линия на больших экранах --}}
                <div class="pointer-events-none absolute
                           left-[12.5%] right-[12.5%] top-[59px]
                           hidden h-px bg-[#d5c5bc] lg:block" aria-hidden="true"></div>

                <div class="relative grid grid-cols-1 gap-5
                           sm:grid-cols-2 lg:grid-cols-4">
                    @forelse ($steps as $step)
                        <article
                            class="group relative flex h-full min-h-[290px]
                                                                                                                       flex-col overflow-hidden rounded-[26px]
                                                                                                                       border border-[#e0d5ce]
                                                                                                                       bg-bed-milk p-6
                                                                                                                       shadow-[0_12px_35px_rgba(87,72,68,0.05)]
                                                                                                                       transition duration-300
                                                                                                                       hover:-translate-y-1
                                                                                                                       hover:border-bed-blush
                                                                                                                       hover:shadow-[0_20px_45px_rgba(87,72,68,0.09)]">
                            {{-- Декоративное свечение --}}
                            <div class="pointer-events-none absolute
                                                                                                                           -right-14 -top-14 h-36 w-36
                                                                                                                           rounded-full bg-bed-blush/20
                                                                                                                           transition duration-500
                                                                                                                           group-hover:scale-125
                                                                                                                           group-hover:bg-bed-blush/30"
                                aria-hidden="true">
                            </div>

                            {{-- Номер шага --}}
                            <div class="relative z-10 flex h-[70px] w-[70px]
                                                                                                                           shrink-0 items-center justify-center
                                                                                                                           rounded-full border-[7px]
                                                                                                                           border-[#f5eee8] bg-bed-blush
                                                                                                                           text-[17px] font-bold text-bed-cocoa
                                                                                                                           shadow-[0_8px_20px_rgba(87,72,68,0.08)]
                                                                                                                           transition duration-300
                                                                                                                           group-hover:scale-105
                                                                                                                           group-hover:bg-bed-rose
                                                                                                                           group-hover:text-white"
                                aria-hidden="true">
                                {{ $step['number'] }}
                            </div>

                            <h3
                                class="relative mt-7 text-[21px] font-bold
                                                                                                                           leading-snug tracking-[-0.025em]
                                                                                                                           text-bed-ink">
                                {{ $step['title'] }}
                            </h3>

                            <p
                                class="relative mt-3 text-[14px]
                                                                                                                           leading-6 text-bed-muted">
                                {{ $step['text'] }}
                            </p>

                            {{-- Нижний декоративный элемент --}}
                            <div class="relative mt-auto flex items-center
                                                                                                                           gap-2 pt-6 text-bed-rose-dark"
                                aria-hidden="true">
                                <span
                                    class="h-1.5 w-1.5 rounded-full
                                                                                                                               bg-current"></span>

                                <span
                                    class="h-px w-8 bg-current
                                                                                                                               transition-all duration-300
                                                                                                                               group-hover:w-14"></span>
                            </div>
                        </article>
                    @empty
                        <div
                            class="rounded-[26px] border border-[#e0d5ce]
                                                                                                                       bg-bed-milk p-8 text-center
                                                                                                                       text-[15px] text-bed-muted
                                                                                                                       sm:col-span-2 lg:col-span-4">
                            Этапы работы временно не добавлены.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>