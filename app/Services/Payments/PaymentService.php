<?php

namespace App\Services\Payments;

use App\Services\Payments\Actions\CancelPaymentAction;
use App\Services\Payments\Actions\CompletePaymentAction;
use App\Services\Payments\Actions\CreatePaymentAction;
use App\Services\Payments\Actions\GetPaymentAction;
use App\Services\Payments\Actions\GetPaymentMethodsAction;
use App\Services\Payments\Actions\UpdatePaymentAction;
use App\Services\Payments\Drivers\PaymentDriver;
use App\Services\Payments\Drivers\PaymentDriverFactory;
use App\Services\Payments\Enums\PaymentDriverEnum;

class PaymentService
{
    public function getDriver(PaymentDriverEnum $driver): PaymentDriver
    {
        return (new PaymentDriverFactory)->make($driver);
    }

    public function createPayment(): CreatePaymentAction
    {
        return (new CreatePaymentAction);
    }

    public function getPayments(): GetPaymentAction
    {
        return (new GetPaymentAction);
    }

    public function getPaymentMethods(): GetPaymentMethodsAction
    {
        return (new GetPaymentMethodsAction);
    }

    public function updatePayment(): UpdatePaymentAction
    {
        //иньекция зависимости для того чтобы в конструкторе вызывать доп классы
        return app(UpdatePaymentAction::class);
    }

    public function completePayment(): CompletePaymentAction
    {
        return new CompletePaymentAction;
    }

    public function cancelPayment(): CancelPaymentAction
    {
        return new CancelPaymentAction;
    }

}
