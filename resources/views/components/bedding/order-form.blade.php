<section
    id="order"
    class="scroll-mt-[90px] bg-bed-milk py-20 md:py-28"
    aria-labelledby="bedding-order-title"
>
    <div class="bed-container">
        <div
            class="relative isolate overflow-hidden rounded-[32px]
                   border border-[#d9c6bd] bg-[#e8d7d0]
                   shadow-[0_25px_70px_rgba(87,72,68,0.1)]"
        >
            <div class="grid lg:grid-cols-[0.84fr_1.16fr]">
                {{-- Описание услуги --}}
                <div
                    class="flex flex-col justify-between
                           p-7 sm:p-10 lg:p-14"
                >
                    <div>
                        <p class="bed-kicker">
                            Индивидуальный расчёт
                        </p>

                        <h2
                            id="bedding-order-title"
                            class="mt-5 text-[38px] font-bold
                                   leading-[1.04] tracking-[-0.045em]
                                   text-bed-ink sm:text-[48px] lg:text-[56px]"
                        >
                            Рассчитаем стоимость вашего комплекта
                        </h2>

                        <p
                            class="mt-6 max-w-[500px] text-[16px]
                                   leading-7 text-bed-muted"
                        >
                            Расскажите о своих пожеланиях. Мы поможем
                            выбрать ткань, оттенок, размеры и комплектацию.
                        </p>
                    </div>

                    <ul class="mt-10 space-y-4">
                        @foreach ([
                            'Подбор приятной ткани и оттенка',
                            'Расчёт по индивидуальным размерам',
                            'Помощь с выбором комплектации',
                        ] as $advantage)
                            <li
                                class="flex items-center gap-3
                                       text-[14px] font-medium text-bed-cocoa"
                            >
                                <span
                                    class="flex h-8 w-8 shrink-0
                                           items-center justify-center
                                           rounded-full bg-bed-milk
                                           text-bed-rose-dark"
                                    aria-hidden="true"
                                >
                                    ✓
                                </span>

                                <span>{{ $advantage }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Форма заявки --}}
                <div class="p-4 sm:p-6 lg:p-8">
                    <form
                        wire:submit="submit"
                        class="rounded-[28px] border border-white/80
                               bg-[#fcfaf7]/95 p-6 text-bed-ink
                               shadow-[0_24px_70px_rgba(87,72,68,0.12)]
                               sm:p-8 lg:p-10"
                        novalidate
                    >
                        <div class="mb-7">
                            <h3 class="text-[27px] font-bold">
                                Получить расчёт
                            </h3>

                            <p class="mt-2 text-[14px] text-bed-muted">
                                Ответим в течение рабочего дня.
                            </p>
                        </div>

                        {{-- Успешная отправка --}}
                        @if ($sent)
                            <div
                                role="status"
                                aria-live="polite"
                                class="mb-6 rounded-2xl
                                       border border-[#b9cdb5]
                                       bg-[#edf4eb] px-5 py-4
                                       text-[#50634d]"
                            >
                                <strong class="block">
                                    Заявка успешно отправлена
                                </strong>

                                <p class="mt-1">
                                    Спасибо! Мы свяжемся с вами.
                                </p>
                            </div>
                        @endif

                        {{-- Общая ошибка формы --}}
                        @error('form')
                            <div
                                role="alert"
                                class="mb-6 rounded-2xl
                                       border border-[#e2b8b3]
                                       bg-[#fff0ee] px-5 py-4
                                       text-[#9c514b]"
                            >
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="grid gap-5 sm:grid-cols-2">
                            {{-- Имя --}}
                            <div>
                                <label
                                    for="bedding-name"
                                    class="mb-2 block text-[13px] font-bold"
                                >
                                    Ваше имя
                                </label>

                                <input
                                    id="bedding-name"
                                    name="name"
                                    type="text"
                                    wire:model.blur="name"
                                    maxlength="100"
                                    autocomplete="name"
                                    placeholder="Например, Анна"
                                    required
                                    aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                                    aria-describedby="bedding-name-error"
                                    @class([
                                        'bed-field',
                                        'bed-field--invalid' => $errors->has('name'),
                                    ])
                                >

                                <p
                                    id="bedding-name-error"
                                    @class([
                                        'mt-2 text-[13px] text-[#b55e58]',
                                        'hidden' => ! $errors->has('name'),
                                    ])
                                    role="alert"
                                >
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>

                            {{-- Телефон с маской --}}
                            <div
                                x-data="{
                                    phone: $wire.entangle('phone'),

                                    format(value) {
                                        const raw = String(value ?? '').trim();
                                        let digits = raw.replace(/\D/g, '');

                                        if (raw.startsWith('+7')) {
                                            digits = digits.slice(1);
                                        } else if (
                                            digits.length === 11
                                            && /^[78]/.test(digits)
                                        ) {
                                            digits = digits.slice(1);
                                        }

                                        digits = digits.slice(0, 10);

                                        if (digits.length === 0) {
                                            return '';
                                        }

                                        let result = '+7 (' + digits.slice(0, 3);

                                        if (digits.length > 3) {
                                            result += ') ' + digits.slice(3, 6);
                                        }

                                        if (digits.length > 6) {
                                            result += '-' + digits.slice(6, 8);
                                        }

                                        if (digits.length > 8) {
                                            result += '-' + digits.slice(8, 10);
                                        }

                                        return result;
                                    },

                                    updatePhone(event) {
                                        const input = event.target;
                                        const raw = input.value;
                                        const cursor = input.selectionStart ?? raw.length;
                                        const allDigits = raw.replace(/\D/g, '');

                                        let digitsBeforeCursor = raw
                                            .slice(0, cursor)
                                            .replace(/\D/g, '')
                                            .length;

                                        const hasCountryCode =
                                            raw.trim().startsWith('+7')
                                            || (
                                                allDigits.length === 11
                                                && /^[78]/.test(allDigits)
                                            );

                                        if (hasCountryCode && digitsBeforeCursor > 0) {
                                            digitsBeforeCursor -= 1;
                                        }

                                        digitsBeforeCursor = Math.min(
                                            digitsBeforeCursor,
                                            10
                                        );

                                        const formatted = this.format(raw);

                                        this.phone = formatted;
                                        input.value = formatted;

                                        this.$nextTick(() => {
                                            if (document.activeElement !== input) {
                                                return;
                                            }

                                            let position = formatted === '' ? 0 : 4;
                                            let count = 0;

                                            for (
                                                let index = 4;
                                                index < formatted.length;
                                                index++
                                            ) {
                                                if (count >= digitsBeforeCursor) {
                                                    break;
                                                }

                                                if (/\d/.test(formatted[index])) {
                                                    count++;
                                                    position = index + 1;
                                                }
                                            }

                                            input.setSelectionRange(
                                                position,
                                                position
                                            );
                                        });
                                    },

                                    beforePhoneInput(event) {
                                        if (
                                            event.inputType === 'insertText'
                                            && /\D/.test(event.data ?? '')
                                        ) {
                                            event.preventDefault();
                                            return;
                                        }

                                        const input = event.target;
                                        const start = input.selectionStart;
                                        const end = input.selectionEnd;

                                        if (start === null || start !== end) {
                                            return;
                                        }

                                        const backward =
                                            event.inputType === 'deleteContentBackward';

                                        const forward =
                                            event.inputType === 'deleteContentForward';

                                        if (!backward && !forward) {
                                            return;
                                        }

                                        event.preventDefault();

                                        let index = backward ? start - 1 : start;
                                        const step = backward ? -1 : 1;

                                        while (
                                            index >= 4
                                            && index < input.value.length
                                            && !/\d/.test(input.value[index])
                                        ) {
                                            index += step;
                                        }

                                        if (
                                            index < 4
                                            || index >= input.value.length
                                        ) {
                                            return;
                                        }

                                        input.value =
                                            input.value.slice(0, index)
                                            + input.value.slice(index + 1);

                                        const position = backward ? index : start;

                                        input.setSelectionRange(
                                            position,
                                            position
                                        );

                                        this.updatePhone(event);
                                    }
                                }"
                            >
                                <label
                                    for="bedding-phone"
                                    class="mb-2 block text-[13px] font-bold"
                                >
                                    Телефон
                                </label>

                                <input
                                    id="bedding-phone"
                                    name="phone"
                                    type="tel"
                                    x-bind:value="format(phone)"
                                    x-on:beforeinput="beforePhoneInput($event)"
                                    x-on:input="updatePhone($event)"
                                    maxlength="18"
                                    autocomplete="tel"
                                    inputmode="numeric"
                                    placeholder="+7 (999) 999-99-99"
                                    required
                                    aria-invalid="{{ $errors->has('phone') ? 'true' : 'false' }}"
                                    aria-describedby="bedding-phone-error"
                                    @class([
                                        'bed-field',
                                        'bed-field--invalid' => $errors->has('phone'),
                                    ])
                                >

                                <p
                                    id="bedding-phone-error"
                                    @class([
                                        'mt-2 text-[13px] text-[#b55e58]',
                                        'hidden' => ! $errors->has('phone'),
                                    ])
                                    role="alert"
                                >
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>

                        {{-- Электронная почта --}}
                        <div class="mt-5">
                            <label
                                for="bedding-email"
                                class="mb-2 block text-[13px] font-bold"
                            >
                                Электронная почта

                                <span class="font-normal text-bed-muted">
                                    — обязательна только для подписки
                                </span>
                            </label>

                            <input
                                id="bedding-email"
                                name="email"
                                type="email"
                                wire:model.blur="email"
                                maxlength="255"
                                autocomplete="email"
                                inputmode="email"
                                placeholder="example@mail.ru"
                                aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                                aria-describedby="bedding-email-error"
                                @class([
                                    'bed-field',
                                    'bed-field--invalid' => $errors->has('email'),
                                ])
                            >

                            <p
                                id="bedding-email-error"
                                @class([
                                    'mt-2 text-[13px] text-[#b55e58]',
                                    'hidden' => ! $errors->has('email'),
                                ])
                                role="alert"
                            >
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        {{-- Описание заказа --}}
                        <div
                            class="mt-5"
                            x-data="{ length: 0 }"
                            x-effect="length = ($wire.message ?? '').length"
                        >
                            <label
                                for="bedding-message"
                                class="mb-2 block text-[13px] font-bold"
                            >
                                Что вы хотите заказать?
                            </label>

                            <textarea
                                id="bedding-message"
                                name="message"
                                wire:model.blur="message"
                                x-on:input="length = $event.target.value.length"
                                rows="5"
                                maxlength="1000"
                                placeholder="Например: двуспальный комплект из сатина..."
                                required
                                aria-invalid="{{ $errors->has('message') ? 'true' : 'false' }}"
                                aria-describedby="bedding-message-error bedding-message-counter"
                                @class([
                                    'bed-field min-h-[140px] resize-y',
                                    'bed-field--invalid' => $errors->has('message'),
                                ])
                            ></textarea>

                            <div class="mt-2 flex justify-between gap-3">
                                <p
                                    id="bedding-message-error"
                                    class="text-[13px] text-[#b55e58]"
                                    role="alert"
                                >
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </p>

                                <span
                                    id="bedding-message-counter"
                                    class="shrink-0 text-[12px] text-[#9b918c]"
                                    x-text="length + ' / 1000'"
                                >
                                    0 / 1000
                                </span>
                            </div>
                        </div>

                        {{-- Подписка на рассылку --}}
                        <label
                            for="bedding-newsletter"
                            class="mt-5 flex items-start gap-3
                                   text-[13px] text-bed-muted"
                        >
                            <input
                                id="bedding-newsletter"
                                name="wantsNewsletter"
                                type="checkbox"
                                wire:model="wantsNewsletter"
                                class="mt-0.5 shrink-0"
                                aria-invalid="{{ $errors->has('wantsNewsletter') ? 'true' : 'false' }}"
                                aria-describedby="bedding-newsletter-error"
                            >

                            <span>
                                Получать новости и специальные предложения
                                по электронной почте.
                            </span>
                        </label>

                        <p
                            id="bedding-newsletter-error"
                            @class([
                                'mt-2 text-[13px] text-[#b55e58]',
                                'hidden' => ! $errors->has('wantsNewsletter'),
                            ])
                            role="alert"
                        >
                            @error('wantsNewsletter')
                                {{ $message }}
                            @enderror
                        </p>

                        {{-- Отправка --}}
                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            wire:target="submit"
                            class="bed-button-primary mt-6 w-full
                                   disabled:cursor-not-allowed
                                   disabled:opacity-60"
                        >
                            <span
                                wire:loading.remove
                                wire:target="submit"
                            >
                                Получить расчёт стоимости
                            </span>

                            <span
                                wire:loading
                                wire:target="submit"
                            >
                                Отправка...
                            </span>
                        </button>

                        <p
                            class="mt-4 text-center
                                   text-[12px] text-bed-muted"
                        >
                            Нажимая кнопку, вы соглашаетесь
                            на обработку персональных данных.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
