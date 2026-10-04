<div>
    @php
        $fabrics = [
            // [
            //     'number' => '01',
            //     'title' => 'Элитный шёлк',
            //     'image' => 'https://uploads.turbologo.ru/uploads/image/file/570449/9a946dc0-d728-472e-ab93-89ddf53cd936.jpeg',
            //     'alt' => 'Комплект постельного белья из элитного шёлка',
            //     'text' => 'Благородный блеск и исключительная нежность для ценителей премиального комфорта.',
            //     'price' => 'от 31 990 ₽',
            //     'label' => 'Премиум',
            // ],
            // [
            //     'number' => '02',
            //     'title' => 'Премиальный перкаль',
            //     'image' => 'https://uploads.turbologo.ru/uploads/image/file/2104/c2069ad88fc5ccecceb78cad237bf7c9.jpeg',
            //     'alt' => 'Постельное бельё из премиального перкаля',
            //     'text' => 'Дышащая хлопковая ткань с матовой поверхностью и приятной прохладой.',
            //     'price' => 'от 14 390 ₽',
            //     'label' => 'Выбор покупателей',
            // ],
            [
                'number' => '01',
                'title' => 'Сатин',
                'image' => asset('images/satin.jpg'),
                'alt' => 'Комплект постельного белья из плотного поплина',
                'text' => 'Практичная и износостойкая ткань, сохраняющая форму после множества стирок.',
                'price' => 'от 9 000 ₽',
                'label' => 'Практичный',
            ],
            [
                'number' => '02',
                'title' => 'Вареный хлопок',
                'image' => asset('images/fabrics_cotton-blu.jpg'),
                'alt' => 'Тёплое постельное бельё из фланели',
                'text' => 'Мягкий и уютный материал для прохладного времени года и комфортного сна.',
                'price' => 'от 7 000 ₽',
                'label' => 'Для удовольствия',
            ],
            // [
            //     'number' => '05',
            //     'title' => 'Тенсель',
            //     'image' => 'https://uploads.turbologo.ru/uploads/image/file/4065/fcbccd9a9a0d21bbf49041987580eff0.jpeg',
            //     'alt' => 'Постельное бельё из тенселя',
            //     'text' => 'Шелковистая современная ткань, сочетающая выразительную эстетику и комфорт.',
            //     'price' => 'от 35 990 ₽',
            //     'label' => 'Новинка',
            // ],
            [
                'number' => '03',
                'title' => 'Ранфорс',
                'image' => asset('images/fabrics_ranfors.jpg'),
                'alt' => 'Комплект постельного белья из ранфорса',
                'text' => 'Натуральная хлопковая ткань для ежедневного использования дома.',
                'price' => 'от 5 000 ₽',
                'label' => 'На каждый день',
            ],
        ];
    @endphp

    <section id="fabrics" class="scroll-mt-[90px] bg-bed-linen py-20 md:py-28">
        <div class="bed-container">
            <div class="mb-12 grid gap-6 lg:grid-cols-[1fr_420px] lg:items-end">
                <div>
                    <p class="bed-kicker">
                        Каталог тканей
                    </p>

                    <h2 class="bed-title mt-4 max-w-[780px]">
                        Приятные ткани для вашего идеального сна
                    </h2>
                </div>

                <p class="max-w-[420px] text-[16px] leading-7 text-bed-muted">
                    Поможем сравнить плотность, мягкость и фактуру материалов,
                    подобрать спокойный оттенок и подходящую комплектацию.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($fabrics as $fabric)
                    <article class="fabric-card group relative isolate flex min-h-[520px]
                                                           overflow-hidden rounded-[28px] border border-white/30
                                                           bg-bed-cocoa shadow-[0_18px_50px_rgba(64,54,51,0.16)]"
                        aria-label="{{ $fabric['alt'] }}">
                        {{-- Фоновое изображение на всю карточку --}}
                        <div class="absolute inset-0 -z-30 bg-cover bg-center bg-no-repeat
                                                               transition-transform duration-700 ease-out
                                                               group-hover:scale-[1.05]"
                            style="background-image: url('{{ $fabric['image'] }}');" role="img"
                            aria-label="{{ $fabric['alt'] }}"></div>

                        {{-- Общее мягкое затемнение --}}
                        <div class="absolute inset-0 -z-20 bg-[#403633]/15
                                                               transition-colors duration-500
                                                               group-hover:bg-[#403633]/25" aria-hidden="true"></div>

                        {{-- Градиент для читаемости текста --}}
                        <div class="absolute inset-0 -z-10 bg-gradient-to-b
                                                               from-[#302724]/35 via-[#403633]/10
                                                               to-[#302724]/95" aria-hidden="true"></div>

                        {{-- Содержимое карточки --}}
                        <div class="flex min-h-[520px] w-full flex-col justify-between p-5 md:p-7">
                            {{-- Верхняя часть --}}
                            <div class="flex items-start justify-between gap-4">
                                <span class="flex h-11 w-11 shrink-0 items-center justify-center
                                                                       rounded-full border border-white/50 bg-white/80
                                                                       text-[12px] font-bold text-bed-cocoa
                                                                       shadow-md backdrop-blur-md">
                                    {{ $fabric['number'] }}
                                </span>

                                <span class="rounded-full border border-white/30
                                                                       bg-[#f3e4df]/90 px-4 py-2 text-[10px]
                                                                       font-bold uppercase tracking-[0.1em]
                                                                       text-bed-rose-dark shadow-md backdrop-blur-md">
                                    {{ $fabric['label'] }}
                                </span>
                            </div>

                            {{-- Нижняя часть --}}
                            <div>
                                <h3 class="text-[28px] font-bold leading-tight
                                                                       tracking-[-0.035em] text-white
                                                                       drop-shadow-[0_2px_12px_rgba(0,0,0,0.35)]">
                                    {{ $fabric['title'] }}
                                </h3>

                                <p class="mt-3 max-w-[390px] text-[14px] leading-6
                                                                       text-white/85
                                                                       drop-shadow-[0_2px_8px_rgba(0,0,0,0.35)]">
                                    {{ $fabric['text'] }}
                                </p>

                                <div class="mt-6 flex items-center justify-between
                                                                       border-t border-white/30 pt-5">
                                    <span class="text-[19px] font-bold text-white
                                                                           drop-shadow-[0_2px_8px_rgba(0,0,0,0.4)]">
                                        {{ $fabric['price'] }}
                                    </span>

                                    <a href="#order" aria-label="Рассчитать комплект из ткани {{ $fabric['title'] }}" class="flex h-12 w-12 items-center justify-center
                                                                           rounded-full border border-white/40
                                                                           bg-white/85 text-bed-cocoa shadow-md
                                                                           backdrop-blur-md transition duration-300
                                                                           hover:scale-105 hover:border-bed-rose
                                                                           hover:bg-bed-rose hover:text-white">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" aria-hidden="true">
                                            <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8 flex flex-col gap-5 rounded-[28px]
                       border border-[#d5c4ba] bg-[#e7d7cf]
                       px-7 py-7 sm:flex-row sm:items-center
                       sm:justify-between md:px-9">
                <div>
                    <h3 class="text-[23px] font-bold tracking-[-0.03em]
                               text-bed-ink">
                        Не знаете, какую ткань выбрать?
                    </h3>

                    <p class="mt-1 text-[14px] leading-6 text-bed-muted">
                        Расскажите о своих пожеланиях — предложим несколько
                        подходящих вариантов.
                    </p>
                </div>

                <a href="{{ route('order-form') }}" class="bed-button-primary shrink-0">
                    Получить консультацию
                </a>
            </div>
        </div>
    </section>
</div>