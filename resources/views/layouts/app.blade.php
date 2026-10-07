<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        $siteName = config('app.name', 'Bedding Atelier');

        $pageTitle = isset($title) && filled($title)
            ? $title
            : 'Постельное бельё на заказ по индивидуальным размерам — Bedding Atelier';

        $pageDescription = isset($description) && filled($description)
            ? $description
            : 'Пошив постельного белья из турецкого хлопка на заказ. '
            . 'Индивидуальные размеры, качественные ткани и доставка.'
            . 'Пошив постельного белья на заказ по индивидуальным размерам.
                                Поможем подобрать ткань, согласовать комплектацию и детали пошива.
                                Посмотрите наши работы и оставьте заявку.';

        /*
         * request()->url() возвращает текущий URL
         * без query-параметров.
         */
        $canonical = request()->url();
    @endphp

    <title>{{ $pageTitle }} — {{ $siteName }}</title>

    <meta name="description" content="{{ $pageDescription }}">

    <meta name="robots" content="index, follow">

    <meta name="theme-color" content="#eadbd4">

    <link rel="canonical" href="{{ $canonical }}">

    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/logo/logo-b_a1.png') }}">

    <link rel="apple-touch-icon" href="{{ asset('images/logo/logo-b_a1.png') }}">

    <meta property="og:type" content="website">

    <meta property="og:locale" content="ru_RU">

    <meta property="og:site_name" content="{{ $siteName }}">

    <meta property="og:title" content="{{ $pageTitle }} — {{ $siteName }}">

    <meta property="og:description" content="{{ $pageDescription }}">

    <meta property="og:url" content="{{ $canonical }}">

    <meta property="og:image" content="{{ asset('images/logo/logo-b_a1.png') }}">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

    @livewireStyles

    <x-seo.structured-data :title="$pageTitle" :description="$pageDescription" :canonical="$canonical" />

    @stack('head')
</head>

<body id="top" class="flex min-h-screen flex-col bg-white antialiased">
    <livewire:components.bedding.header />

    <main class="flex flex-1 flex-col">
        {{ $slot }}
    </main>

    <livewire:components.bedding.footer />

    @livewireScripts

    @stack('scripts')
</body>

</html>