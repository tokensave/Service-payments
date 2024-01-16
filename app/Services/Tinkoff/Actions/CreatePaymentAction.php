<?php

namespace App\Services\Tinkoff\Actions;


use App\Services\Tinkoff\Entities\PaymentEntity;
use App\Services\Tinkoff\Enums\PaymentStatusEnum;
use App\Services\Tinkoff\TinkoffClient;
use App\Services\Tinkoff\TinkoffService;

class CreatePaymentAction
{
    public function __construct(
        private TinkoffService $tinkoff
    )
    {
    }

    public static function make(TinkoffService $tinkoff): static
    {
        return new static($tinkoff);
    }

    public function run(CreatePaymentData $data): PaymentEntity
    {
        $response = TinkoffClient::make($this->tinkoff)
            ->post('Init', [
                'TerminalKey' => $this->tinkoff->config->terminal,
                'Amount' => $data->amount,
                'OrderId' => $data->order,
                'SuccessURL' => $data->successUrl,
                'FailURL' => $data->failureUrl,
                'NotificationURL' => $data->callbackUrl,
            ]);

        return new PaymentEntity(
            $response['PaymentId'],
            PaymentStatusEnum::from($response['Status']),
            $response['OrderId'],
            $response['Amount'],
            $response['PaymentURL']
        );
    }
}
