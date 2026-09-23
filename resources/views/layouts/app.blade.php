<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Постельное бельё</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="antialiased bg-white">


    <livewire:components.bedding.header class="pt-100" />

    <main>
        {{$slot}}

    </main>

    <livewire:components.bedding.footer />

    @livewireScripts
</body>

</html>