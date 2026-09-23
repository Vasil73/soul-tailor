@props([
    'type' => null,
])
@switch($type)
    @case('vk')
        <svg
            class="h-6 w-6"
            viewBox="0 0 24 24"
            fill="currentColor"
            aria-hidden="true"
        >
            <path
                d="M15.07 2H8.93C3.33 2 2 3.33 2 8.93v6.14
                   C2 20.67 3.33 22 8.93 22h6.14
                   C20.67 22 22 20.67 22 15.07V8.93
                   C22 3.33 20.67 2 15.07 2Zm3.08 14.27h-1.46
                   c-.55 0-.72-.44-1.7-1.42
                   -.85-.82-1.22-.93-1.43-.93
                   -.29 0-.37.08-.37.48v1.3
                   c0 .35-.11.56-1.03.56
                   -1.52 0-3.2-.92-4.38-2.62
                   -1.77-2.49-2.26-4.36-2.26-4.74
                   0-.21.08-.4.48-.4h1.46
                   c.37 0 .51.17.65.56
                   .72 2.08 1.93 3.9 2.43 3.9
                   .19 0 .27-.09.27-.58v-2.26
                   c-.06-1.04-.61-1.13-.61-1.5
                   0-.18.15-.36.37-.36h2.3
                   c.31 0 .42.17.42.53v3.05
                   c0 .33.14.44.24.44
                   .19 0 .35-.11.7-.46
                   1.09-1.22 1.86-3.1 1.86-3.1
                   .1-.21.27-.4.64-.4h1.46
                   c.44 0 .54.23.44.54
                   -.18.84-1.94 3.33-1.94 3.33
                   -.16.25-.22.37 0 .66
                   .16.21.68.67 1.03 1.08
                   .64.73 1.13 1.34 1.26 1.76
                   .15.42-.08.63-.48.63Z"
            />
        </svg>
        @break

    @case('telegram')
        <svg
            class="h-6 w-6"
            viewBox="0 0 24 24"
            fill="currentColor"
            aria-hidden="true"
        >
            <path
                d="M21.6 3.2 18.4 20
                   c-.24 1.18-.88 1.47-1.78.91
                   l-4.87-3.59-2.35 2.26
                   c-.26.26-.48.48-.98.48
                   l.35-4.96 9.02-8.15
                   c.39-.35-.09-.55-.61-.2
                   L6.03 13.77l-4.8-1.5
                   c-1.04-.33-1.06-1.04.22-1.54
                   L20.2 3.5c.87-.32 1.63.2 1.4 1.7Z"
            />
        </svg>
        @break

    @case('rutube')
        <svg
            class="h-6 w-6"
            viewBox="0 0 24 24"
            fill="none"
            aria-hidden="true"
        >
            <rect
                x="2.5"
                y="5"
                width="19"
                height="14"
                rx="4"
                stroke="currentColor"
                stroke-width="2"
            />

            <path
                d="M10 9.25v5.5L15 12l-5-2.75Z"
                fill="currentColor"
            />

            <circle
                cx="19"
                cy="6"
                r="2"
                fill="#ff4b55"
            />
        </svg>
        @break

    @case('max')
        <svg
            class="h-6 w-6"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
        >
            <path d="M7.5 17V7.5l4.5 5 4.5-5V17" />
            <path
                d="M5 3.5h14A2.5 2.5 0 0 1 21.5 6v10
                   A2.5 2.5 0 0 1 19 18.5h-5.7L9 21v-2.5H5
                   A2.5 2.5 0 0 1 2.5 16V6
                   A2.5 2.5 0 0 1 5 3.5Z"
            />
        </svg>
        @break

    @case('email')
        <svg
            class="h-6 w-6"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
        >
            <rect x="3" y="5" width="18" height="14" rx="2" />
            <path d="m3 7 9 6 9-6" />
        </svg>
        @break

    @default
        <svg
            class="h-6 w-6"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
        >
            <path
                d="M21 15a4 4 0 0 1-4 4H8l-5 3V7
                   a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4Z"
            />
        </svg>
@endswitch
