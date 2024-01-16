<?php

namespace App\Services\Payments\Enums;

enum PaymentDriverEnum: string
{
    case test = 'test';
    case tinkoff = 'tinkoff';
    case stripe = 'stripe';
    case yookassa = 'yookassa';


    public function name(): string
    {
        return match ($this) {
            self::test => 'Тестовый провайдер',
            self::tinkoff => 'Tinkoff',
            self::stripe => 'Stripe',
            self::yookassa => 'Yookassa',
        };
    }

    public function isTest(): bool
    {
       return $this === self::test;
    }

}
