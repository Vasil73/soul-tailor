<div>
    @php
        $features = [
            [
                'title' => 'Любые размеры',
                'text' => 'Евро, семейный, детский или нестандартный комплект.',
            ],
            [
                'title' => 'Простыня на резинке',
                'text' => 'Учтём длину, ширину и точную высоту вашего матраса.',
            ],
            [
                'title' => 'Выбор застёжки',
                'text' => 'Молния, пуговицы, клапан или классический открытый край.',
            ],
            [
                'title' => 'Контроль качества',
                'text' => 'Проверяем швы, размеры и обработку каждого изделия.',
            ],
        ];
    @endphp

    <section id="sizes" class="scroll-mt-[90px] bg-bed-linen py-20 md:py-28">
        <div class="bed-container">
            <div class="grid gap-7 lg:grid-cols-[1.02fr_0.98fr] lg:items-stretch">
                <div class="sizes-media min-h-[540px] rounded-[30px]
                           lg:min-h-[720px]">
                    <div wire:ignore class="sizes-media__video-layer" aria-hidden="true">
                        <video autoplay muted loop playsinline preload="metadata"
                            poster="{{ asset('images/sizes.jpg') }}" width="912" height="720"
                            class="sizes-media__video">
                            <source src="{{ asset('video/sizes_video-fox.mp4') }}" type="video/mp4">
                        </video>
                    </div>

                    <div class="sizes-media__overlay" aria-hidden="true"></div>

                    <div class="sizes-media__content min-h-[540px] lg:min-h-[720px]">
                        <div class="absolute inset-x-0 bottom-0 p-5 sm:p-8">
                            <div class="max-w-[470px] rounded-[24px]
                                       border border-white/30 bg-[#fcf9f5]/88
                                       p-6 text-bed-ink shadow-xl
                                       shadow-black/10 backdrop-blur-xl">
                                <div class="text-[12px] font-bold uppercase
                                           tracking-[0.17em] text-bed-rose-dark">
                                    Точность в каждой детали
                                </div>

                                <p class="mt-3 text-[21px] font-bold leading-8
                                           tracking-[-0.025em]">
                                    Комплект будет подходить именно вашей кровати,
                                    а не стандартной таблице размеров.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" tailoring-panel rounded-[30px] border
                           border-[#d9c3ba] p-7 text-bed-ink
                           shadow-[0_20px_60px_rgba(87,72,68,0.08)]
                           sm:p-10 lg:p-12">
                    <p class="bed-kicker">
                        Индивидуальный пошив
                    </p>

                    <h2 class="mt-5 text-[38px] font-bold leading-[1.04]
                               tracking-[-0.045em] text-bed-ink
                               sm:text-[48px] lg:text-[56px]">
                        Сошьём комплект под ваши размеры
                    </h2>

                    <p class="mt-6 max-w-[580px] text-[16px] leading-7 text-bed-muted">
                        Учитываем высоту матраса, размеры одеяла, форму подушек,
                        расположение застёжек и декоративные детали.
                    </p>

                    <div class="mt-9 divide-y divide-[#cdb8af]
                               border-y border-[#cdb8af]">
                        @foreach ($features as $index => $feature)
                            <div class="grid grid-cols-[42px_1fr] gap-4 py-6">
                                <span class=" flex h-9 w-9 items-center justify-center
                                                                       rounded-full bg-bed-milk text-[13px]
                                                                       font-bold color-text_tailoring shadow-sm">
                                    {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <div>
                                    <h3 class="text-[18px] font-bold text-bed-ink">
                                        {{ $feature['title'] }}
                                    </h3>

                                    <p class="mt-2 text-[14px] leading-6 text-bed-muted">
                                        {{ $feature['text'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="#order" class="bed-button-primary mt-9">
                        Рассчитать индивидуальный комплект
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>