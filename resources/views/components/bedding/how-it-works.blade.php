<div>
    @php
        $steps = [
            [
                'number' => '01',
                'title' => 'Оставляете заявку',
                'text' => 'Рассказываете, какой комплект нужен, и указываете удобный способ связи.',
            ],
            [
                'number' => '02',
                'title' => 'Выбираем ткань',
                'text' => 'Помогаем сравнить материалы, оттенки, плотность и доступные варианты.',
            ],
            [
                'number' => '03',
                'title' => 'Уточняем размеры',
                'text' => 'Проверяем параметры матраса, одеяла, подушек и согласовываем детали.',
            ],
            [
                'number' => '04',
                'title' => 'Шьём и передаём',
                'text' => 'Изготавливаем комплект, проверяем качество и согласовываем получение.',
            ],
        ];
    @endphp

    <section id="process" class="scroll-mt-[90px] bg-[#f5eee8] py-20 md:py-28">
        <div class="bed-container">
            <div class="grid gap-7 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <p class="bed-kicker">
                        Как мы работаем
                    </p>

                    <h2 class="bed-title mt-4">
                        Четыре спокойных шага до готового комплекта
                    </h2>
                </div>

                <p class="max-w-[560px] text-[16px] leading-7
                           text-bed-muted lg:justify-self-end">
                    Помогаем на каждом этапе: подбираем ткань, проверяем размеры,
                    согласовываем детали и контролируем качество пошива.
                </p>
            </div>

            <div class="relative mt-12">
                <div class="absolute left-0 right-0 top-[35px] hidden h-px
                           bg-[#d5c5bc] lg:block" aria-hidden="true"></div>

                <div class="relative grid grid-cols-1 gap-5
                           sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($steps as $step)
                        <article class="group rounded-[26px] border border-[#e0d5ce]
                                           bg-bed-milk p-6
                                           shadow-[0_12px_35px_rgba(87,72,68,0.05)]
                                           transition duration-300 hover:-translate-y-1
                                           hover:border-bed-blush
                                           hover:shadow-[0_20px_45px_rgba(87,72,68,0.09)]">
                            <div class="relative z-10 flex h-[70px] w-[70px]
                                               items-center justify-center rounded-full
                                               border-[7px] border-[#f5eee8]
                                               bg-bed-blush text-[17px] font-bold
                                               text-bed-cocoa transition
                                               group-hover:bg-bed-rose
                                               group-hover:text-white">
                                {{ $step['number'] }}
                            </div>

                            <h3 class="mt-7 text-[21px] font-bold
                                               tracking-[-0.025em] text-bed-ink">
                                {{ $step['title'] }}
                            </h3>

                            <p class="mt-3 text-[14px] leading-6 text-bed-muted">
                                {{ $step['text'] }}
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>