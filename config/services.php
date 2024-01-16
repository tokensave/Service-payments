<?php

return [

    'tinkoff' => [
        'terminal' => env('TINKOFF_TERMINAL'),
        'password' => env('TINKOFF_PASSWORD'),
    ],

    'stripe' => [
        'public_key' => env('STRIPE_PUBLIC_KEY'),
        'secret_key' => env('STRIPE_SECRET_KEY'),
        'webhook_key' => env('STRIPE_WEBHOOK_KEY'),
    ],

    'yookassa' => [
        'app_client_key' => env('YOOKASSA_APP_CLIENT_ID'),
        'app_secret_key' => env('YOOKASSA_APP_CLIENT_SECRET'),
        'shop_id' => env('YOOKASSA_SHOP_ID'),
        'shop_secret' => env('YOOKASSA_SHOP_SECRET')
    ],
];
