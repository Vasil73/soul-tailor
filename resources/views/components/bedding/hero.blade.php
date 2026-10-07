<section id="top" class="relative isolate pt-[100px] flex min-h-[760px] overflow-hidden
           bg-bed-cocoa text-white lg:min-h-[700px]">
    <div wire:ignore class="absolute inset-0 z-0 overflow-hidden" aria-hidden="true">
        <video autoplay muted loop playsinline preload="metadata" poster="{{ asset('images/hero.jpg') }}"
            class="hero-video" loading="lazy" decoding="async">
            <source src="{{ asset('video/hero.webm') }}" type="video/webm">

            <source src="{{ asset('video/hero_video.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="absolute inset-0 z-[1] bg-[#493c38]/25" aria-hidden="true"></div>

    <div class="absolute inset-0 z-[2] bg-gradient-to-r
               from-[#403431]/90 via-[#574844]/55 to-[#574844]/10" aria-hidden="true"></div>

    <div class="absolute inset-x-0 bottom-0 z-[2] h-2/3
               bg-gradient-to-t from-[#403431]/90 via-[#403431]/25
               to-transparent" aria-hidden="true"></div>

    <div class="bed-container relative z-10 flex w-full flex-col
               justify-between
               lg:pb-20">
        <div class="max-w-[860px]">
            <div class="inline-flex items-center gap-3 rounded-full
                       border border-white/25 bg-white/[0.12] px-4 py-2
                       text-[11px] font-bold uppercase tracking-[0.17em]
                       text-white/[0,90] backdrop-blur-md">
                <span class="h-2 w-2 rounded-full bg-[#e5c9c0]"></span>
                Пошив по индивидуальным размерам
            </div>

            <h1 class="mt-7 max-w-[880px] text-[42px] font-bold
                       leading-[1.01] tracking-[-0.05em]
                       sm:text-[58px] md:text-[70px] lg:text-[82px]">
                Постельное бельё для
                <span class="text-[#ead3cb]">
                    спокойного и уютного сна
                </span>
            </h1>

            <p class="mt-7 max-w-[650px] text-[17px] leading-7 text-white/80
                       sm:text-[19px] sm:leading-8">
                Шьём постельное бельё под размеры вашей кровати,
                одеяла и подушек. Помогаем выбрать ткань,
                согласовать комплектацию и детали пошива.
            </p>

            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('order-form') }}" class="bed-button-primary">
                    {{ __('Рассчитать стоимость') }}

                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

                <a href="{{ route('our-works') }}" class="inline-flex min-h-[54px] items-center justify-center
                           rounded-full border border-white/30 bg-white/10
                           px-7 font-bold text-white backdrop-blur-md
                           transition hover:border-white/60 hover:bg-white/20">
                    {{ __('Наши работы') }}
                </a>
            </div>
        </div>

        <div class="mt-16 grid max-w-[900px] grid-cols-1 overflow-hidden
                   rounded-[26px] border border-white/20 bg-white/12
                   shadow-2xl shadow-black/10 backdrop-blur-xl sm:grid-cols-3">
            @foreach ([
                    ['value' => '5+', 'text' => 'видов премиальных тканей'],
                    ['value' => '2–5 дней', 'text' => 'средний срок пошива'],
                    ['value' => '100%', 'text' => 'индивидуальные размеры'],
                ] as $stat)
                <div
                    class="border-b border-white/15 px-6 py-5
                                                                                                                                                                                                               last:border-b-0 sm:border-b-0 sm:border-r
                                                                                                                                                                                                               sm:last:border-r-0">
                    <div
                        class="text-[29px] font-bold tracking-[-0.04em]
                                                                                                                                                                                                                   text-[#ead3cb]">
                        {{ $stat['value'] }}
                    </div>

                    <div class="mt-1 text-[13px] leading-5 text-white/70">
                        {{ $stat['text'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>