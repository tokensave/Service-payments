<?php

namespace App\Http\Controllers\Api\Payments\Callbacks;


use App\Http\Controllers\Controller;
use App\Services\Payments\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use YooKassa\Client;
use YooKassa\Model\Notification\NotificationEventType;

class YookassaController extends Controller
{
    public function __invoke(Request $request, PaymentService $payments)
    {
        $data = $request->all();
        Log::debug('data', $data);
        $payment = $payments->getPayments()
            ->uuid($data['object']['metadata']['uuid'])
            ->first();

        match ($data['event']) {
            NotificationEventType::PAYMENT_SUCCEEDED => $payments->completePayment()->run($payment),
            NotificationEventType::PAYMENT_CANCELED => $payments->cancelPayment()->run($payment),
            default =>null,
        };

        return response()->json(['data' => 'success']);
    }
}
