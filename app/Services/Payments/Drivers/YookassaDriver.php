<?php

namespace App\Services\Payments\Drivers;

use App\Services\Payments\Models\Payment;
use Illuminate\Contracts\View\View;
use YooKassa\Client;

class YookassaDriver extends PaymentDriver
{

    public function view(Payment $payment): View
    {
        $client = new Client();

        $client->setAuth(config('services.yookassa.shop_id'), config('services.yookassa.shop_secret'));

        $response = $client->createPayment(
            [
                'amount' => [
                    'value' => $payment->driver_amount->value(),
                    'currency' => $payment->currency_id,
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => route('orders'),
                ],
                'capture' => true,
                'metadata' => ['uuid' => $payment->uuid,],
            ], uniqid('', true));

        return view('payments::yookassa',
            [
                'payment' => $payment,
                'response' => $response,
            ]);
    }
}
