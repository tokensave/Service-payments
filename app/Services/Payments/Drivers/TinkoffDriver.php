<?php

namespace App\Services\Payments\Drivers;

use App\Services\Payments\Models\Payment;
use App\Services\Tinkoff\Actions\CreatePaymentData;
use App\Services\Tinkoff\TinkoffService;
use Illuminate\Contracts\View\View;

class TinkoffDriver extends PaymentDriver
{
    public function __construct(
        private TinkoffService $tinkoffService,
    ){

    }

    public function view(Payment $payment): View
    {
        $tinkoffPayment = $this->tinkoffService->createPayment(
            new CreatePaymentData(
                amount: $payment->driver_amount->value() * 100,
                order: $payment->uuid,
                successUrl: route('payments.success', ['uuid' => $payment->uuid]),
                failureUrl:  route('payments.failure', ['uuid' => $payment->uuid]),
                //callback - из сайта https://webhook.site/ либо ngrok
                callbackUrl: "https://webhook.site/a99e5cc9-2425-4927-ad88-3694bbb4b0c7",
//                callbackUrl: route('api.payments.callbacks.tinkoff'),
            )
        );

        $payment->update(['driver_payment_id' => $tinkoffPayment->id]);

        return view('payments::tinkoff', compact('payment', 'tinkoffPayment'));
    }
}
