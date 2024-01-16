<?php

namespace App\Adapters;

use App\Services\Currencies\CurrencyService;
use App\Services\Payments\Contracts\PaymentConverter;
use App\Support\Values\AmountValue;

class CurrencyPaymentConverter implements PaymentConverter
{
    public function __construct(
        private CurrencyService $currencyService,
    ){

    }

    public function convert(AmountValue $amount, string $from, string $to): AmountValue
    {
        return $this->currencyService
            ->convert()
            ->from($from)
            ->to($to)
            ->run($amount);
    }
}
