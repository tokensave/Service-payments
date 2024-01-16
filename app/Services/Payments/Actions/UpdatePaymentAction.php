<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Contracts\PaymentConverter;
use App\Services\Payments\Models\Payment;
use App\Services\Payments\Models\PaymentMethod;
use App\Support\Values\AmountValue;

class UpdatePaymentAction
{
    private PaymentMethod|null $method;

//создали адаптер как интерфейс и на уровне приложения его добавили(AppServiceProvider)
    public function __construct(
        private PaymentConverter $paymentConverter
    ){

    }

    public function method(PaymentMethod $method): static
    {
        $this->method = $method;

        return $this;
    }

    public function run(Payment $payment): bool
    {
        if(!is_null($this->method))
        {
            $payment->method_id = $this->method->id;
            $payment->driver = $this->method->driver;
            $payment->driver_currency_id = $this->method->driver_currency_id;
            $payment->driver_amount = $this->convertAmount($payment);

        }
        return $payment->save();
    }

    private function convertAmount(Payment $payment): AmountValue
    {
        return $this->paymentConverter
            ->convert(
                amount: $payment->amount,
                from: $payment->currency_id,
                to: $payment->driver_currency_id
            );
    }

}
