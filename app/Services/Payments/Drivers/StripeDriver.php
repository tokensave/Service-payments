<?php

namespace App\Services\Payments\Drivers;

use App\Services\Payments\Models\Payment;
use Illuminate\Contracts\View\View;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeDriver extends PaymentDriver
{

    public function view(Payment $payment): View
    {
        Stripe::setApiKey(config('services.stripe.secret_key'));

        $session = Session::create([
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'payment_intent_data' => ['metadata' => ['uuid' => $payment->uuid],],
            'line_items' => [[
                'quantity' => 1,
                'price_data' =>
                    [
                        'unit_amount' => $payment->driver_amount->value() * 100,
                        'currency' => strtolower($payment->driver_currency_id),
                        'product_data' =>
                            [
                                'name' => $payment->payable->getPayableName()
                            ],

                    ],
            ]],
            'success_url' => route('payments.success', ['uuid' => $payment->uuid]),
            'cancel_url' => route('payments.failure', ['uuid' => $payment->uuid]),
        ]);

        return view('payments::stripe', [
            'payment' => $payment,
            'session' => $session,
        ]);
    }
}
