<?php

namespace App\Http\Controllers\Api\Payments\Callbacks;

use App\Http\Controllers\Controller;
use App\Services\Payments\PaymentService;
use App\Services\Tinkoff\Enums\PaymentStatusEnum;
use App\Services\Tinkoff\Exceptions\InvalidTokenException;
use App\Services\Tinkoff\TinkoffService;
use Illuminate\Http\Request;

class TinkoffController extends Controller
{
    public function __invoke(Request $request, PaymentService $paymentService, TinkoffService $tinkoffService)
    {
        try {
            $tinkoffPayment = $tinkoffService->checkCallback($request->all());

            $payment = $paymentService->getPayments()->uuid($tinkoffPayment->order)->first();

            match ($tinkoffPayment->status) {
                PaymentStatusEnum::CONFIRMED => $paymentService->completePayment()->run($payment),
                PaymentStatusEnum::CANCELED => $paymentService->cancelPayment()->run($payment),
                PaymentStatusEnum::REFUNDED => $paymentService->cancelPayment()->run($payment),
                PaymentStatusEnum::REJECTED => $paymentService->cancelPayment()->run($payment),
                PaymentStatusEnum::REVERSED => $paymentService->cancelPayment()->run($payment),
                default =>null,
            };
        } catch (InvalidTokenException $e){
            report($e);
        }

        return response('OK', 200);
    }
}
