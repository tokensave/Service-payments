<?php

namespace App\Services\Payments\Drivers;

use App\Services\Payments\Enums\PaymentDriverEnum;
use App\Services\Tinkoff\TinkoffService;
use InvalidArgumentException;

class PaymentDriverFactory
{
    public function make(PaymentDriverEnum $driver): PaymentDriver
    {
        return match ($driver){
            PaymentDriverEnum::test => app(TestPaymentDriver::class),
            PaymentDriverEnum::tinkoff => app(TinkoffDriver::class),
            PaymentDriverEnum::stripe => app(StripeDriver::class),

            default => throw new InvalidArgumentException(
                "Драйвер [{$driver}] не поддерживается"
            )
        };
    }

}
