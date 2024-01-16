<?php

namespace App\Services\Currencies\Actions;

use App\Services\Currencies\Models\Currency;
use App\Support\Values\AmountValue;

class ConvertCurrencyAction
{
    private string $from;   //RUB
    private string $to;     //Во что конвертируем

    public function from(string $from): static
    {
        $this->from = $from;

        return $this;
    }

    public function to(string $to): static
    {
        $this->to = $to;

        return $this;
    }

    public function run(AmountValue $amount): AmountValue
    {
        $currencies = Currency::getCashed();

        //исходная валюта
        $from = $currencies->firstWhere('id', $this->from);
        //валюта в которую необходимо обменять
        $to = $currencies->firstWhere('id', $this->to);

        if ($from->isNotMain()) {
            $amount = $amount->mul($from->price, 8);
        }

        $result = $amount->div($to->price, 8);

        return new AmountValue($result);
    }
}
