
<section
    id="order"
    class="scroll-mt-[90px] bg-bed-milk py-20 md:py-28"
>
    <div class="bed-container">
        <div
            class="relative isolate overflow-hidden rounded-[32px]
                   border border-[#d9c6bd] bg-[#e8d7d0]
                   shadow-[0_25px_70px_rgba(87,72,68,0.1)]"
        >
            <div
                class="absolute -right-24 -top-28 -z-10 h-[400px] w-[400px]
                       rounded-full bg-white/55 blur-[90px]"
                aria-hidden="true"
            ></div>

            <div
                class="absolute -bottom-40 left-1/4 -z-10 h-[380px] w-[380px]
                       rounded-full bg-bed-sage-light/60 blur-[100px]"
                aria-hidden="true"
            ></div>

            <div class="grid lg:grid-cols-[0.84fr_1.16fr]">
                <div class="flex flex-col justify-between p-7 sm:p-10 lg:p-14">
                    <div>
                        <p class="bed-kicker">
                            Индивидуальный расчёт
                        </p>

                        <h2
                            class="mt-5 text-[38px] font-bold leading-[1.04]
                                   tracking-[-0.045em] text-bed-ink
                                   sm:text-[48px] lg:text-[56px]"
                        >
                            Рассчитаем стоимость вашего комплекта
                        </h2>

                        <p
                            class="mt-6 max-w-[500px] text-[16px]
                                   leading-7 text-bed-muted"
                        >
                            Расскажите о своих пожеланиях. Мы поможем выбрать
                            ткань, оттенок, размеры и подходящую комплектацию.
                        </p>
                    </div>

                    <div class="mt-10 space-y-4">
                        @foreach ([
                            'Подбор приятной ткани и оттенка',
                            'Расчёт по индивидуальным размерам',
                            'Помощь с выбором комплектации',
                        ] as $advantage)
                            <div
                                class="flex items-center gap-3 text-[14px]
                                       font-medium text-bed-cocoa"
                            >
                                <span
                                    class="flex h-8 w-8 shrink-0 items-center
                                           justify-center rounded-full bg-bed-milk
                                           text-bed-rose-dark shadow-sm"
                                >
                                    <svg
                                        class="h-4 w-4"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2.5"
                                        aria-hidden="true"
                                    >
                                        <path
                                            d="m5 12 4 4L19 6"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </span>

                                {{ $advantage }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="p-4 sm:p-6 lg:p-8">
                    <form
                        wire:submit="submit"
                        class="rounded-[28px] border border-white/80
                               bg-[#fcfaf7]/95 p-6 text-bed-ink
                               shadow-[0_24px_70px_rgba(87,72,68,0.12)]
                               backdrop-blur-xl sm:p-8 lg:p-10"
                        novalidate
                    >
                        <div class="mb-7">
                            <h3
                                class="text-[27px] font-bold
                                       tracking-[-0.035em] text-bed-ink"
                            >
                                Получить расчёт
                            </h3>

                            <p class="mt-2 text-[14px] leading-6 text-bed-muted">
                                Ответим и уточним детали в течение рабочего дня.
                            </p>
                        </div>

                        @if ($sent)
                            <div
                                role="status"
                                aria-live="polite"
                                class="mb-6 rounded-2xl border
                                       border-[#b9cdb5] bg-[#edf4eb]
                                       px-5 py-4 text-[14px] leading-6
                                       text-[#50634d]"
                            >
                                <strong class="block font-bold">
                                    Заявка успешно отправлена
                                </strong>

                                Спасибо! Мы свяжемся с вами для уточнения деталей.
                            </div>
                        @endif

                        @error('form')
                            <div
                                role="alert"
                                aria-live="assertive"
                                class="mb-6 rounded-2xl border border-[#e2b8b3]
                                       bg-[#fff0ee] px-5 py-4 text-[14px]
                                       leading-6 text-[#9c514b]"
                            >
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label
                                    for="bedding-name"
                                    class="mb-2 block text-[13px] font-bold
                                           text-bed-cocoa"
                                >
                                    Ваше имя
                                </label>

                                <input
                                    id="bedding-name"
                                    type="text"
                                    wire:model.blur="name"
                                    autocomplete="name"
                                    maxlength="100"
                                    placeholder="Например, Анна"
                                    aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                                    @class([
                                        'bed-field',
                                        'bed-field--invalid' => $errors->has('name'),
                                    ])
                                >

                                @error('name')
                                    <p
                                        class="mt-2 text-[13px] text-[#b55e58]"
                                        role="alert"
                                    >
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label
                                    for="bedding-phone"
                                    class="mb-2 block text-[13px] font-bold
                                           text-bed-cocoa"
                                >
                                    Телефон
                                </label>

                                <input
                                    id="bedding-phone"
                                    type="tel"
                                    wire:model.blur="phone"
                                    autocomplete="tel"
                                    inputmode="tel"
                                    maxlength="30"
                                    placeholder="+7 (999) 999-99-99"
                                    aria-invalid="{{ $errors->has('phone') ? 'true' : 'false' }}"
                                    @class([
                                        'bed-field',
                                        'bed-field--invalid' => $errors->has('phone'),
                                    ])
                                >

                                @error('phone')
                                    <p
                                        class="mt-2 text-[13px] text-[#b55e58]"
                                        role="alert"
                                    >
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-5">
                            <label
                                for="bedding-email"
                                class="mb-2 block text-[13px] font-bold
                                       text-bed-cocoa"
                            >
                                Электронная почта

                                <span class="font-normal text-bed-muted">
                                    — необязательно
                                </span>
                            </label>

                            <input
                                id="bedding-email"
                                type="email"
                                wire:model.blur="email"
                                autocomplete="email"
                                inputmode="email"
                                maxlength="255"
                                placeholder="example@mail.ru"
                                aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                                @class([
                                    'bed-field',
                                    'bed-field--invalid' => $errors->has('email'),
                                ])
                            >

                            @error('email')
                                <p
                                    class="mt-2 text-[13px] text-[#b55e58]"
                                    role="alert"
                                >
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <label
                                for="bedding-message"
                                class="mb-2 block text-[13px] font-bold
                                       text-bed-cocoa"
                            >
                                Что вы хотите заказать?
                            </label>

                            <textarea
                                id="bedding-message"
                                wire:model.blur="message"
                                rows="5"
                                maxlength="1000"
                                placeholder="Например: двуспальный комплект из сатина, две наволочки 50 × 70 см..."
                                aria-invalid="{{ $errors->has('message') ? 'true' : 'false' }}"
                                @class([
                                    'bed-field min-h-[140px] resize-y',
                                    'bed-field--invalid' => $errors->has('message'),
                                ])
                            ></textarea>

                            <div class="mt-2 flex justify-between gap-3">
                                @error('message')
                                    <p
                                        class="text-[13px] text-[#b55e58]"
                                        role="alert"
                                    >
                                        {{ $message }}
                                    </p>
                                @else
                                    <span></span>
                                @enderror

                                <span
                                    class="shrink-0 text-[12px] text-[#9b918c]"
                                    x-data
                                    x-text="`${$wire.message?.length ?? 0} / 1000`"
                                ></span>
                            </div>
                        </div>

                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            wire:target="submit"
                            class="bed-button-primary mt-6 w-full
                                   disabled:cursor-not-allowed
                                   disabled:opacity-60"
                        >
                            <span wire:loading.remove wire:target="submit">
                                Получить расчёт стоимости
                            </span>

                            <span
                                wire:loading.inline-flex
                                wire:target="submit"
                                class="items-center gap-2"
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
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    ></circle>

                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                                    ></path>
                                </svg>

                                Отправка...
                            </span>
                        </button>

                        <p
                            class="mt-4 text-center text-[12px]
                                   leading-5 text-bed-muted"
                        >
                            Нажимая кнопку, вы соглашаетесь на обработку
                            персональных данных.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
