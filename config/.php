<?php

return ['notifications' => ['email' => env('BEDDING_ADMIN_EMAIL')]];

return [
    'contact_phone' => env(
        'BEDDING_CONTACT_PHONE',
        '+7 (831) 000-00-00'
    ),

    'contact_email' => env(
        'BEDDING_CONTACT_EMAIL',
        'info@example.ru'
    ),

    'manager_email' => env(
        'BEDDING_MANAGER_EMAIL',
        env('MAIL_FROM_ADDRESS')
    ),

    'socials' => [
        [
            'type' => 'vk',
            'name' => 'ВКонтакте',
            'description' => 'Перейти в сообщество',
            'href' => env(
                'BEDDING_VK_URL',
                'https://vk.com/your_page'
            ),
            'iconClass' => 'bg-[#0077ff] text-white',
        ],
        [
            'type' => 'telegram',
            'name' => 'Telegram',
            'description' => 'Написать в мессенджере',
            'href' => env(
                'BEDDING_TELEGRAM_URL',
                'https://t.me/your_username'
            ),
            'iconClass' => 'bg-[#229ed9] text-white',
        ],
        [
            'type' => 'rutube',
            'name' => 'RUTUBE',
            'description' => 'Мы на RUTUBE',
            'href' => env(
                'BEDDING_RUTUBE_URL',
                'https://rutube.ru/channel/your_channel/'
            ),
            'iconClass' => 'bg-[#100943] text-white',
        ],
        [
            'type' => 'max',
            'name' => 'MAX',
            'description' => 'Написать в мессенджере',
            'href' => env(
                'BEDDING_MAX_URL',
                'https://max.ru/your_username'
            ),
            'iconClass' => 'bg-[#596cff] text-white',
        ],
    ],
];
