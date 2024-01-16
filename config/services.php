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
];
