<?php

namespace App\Services\Tinkoff\Actions;

use App\Services\Tinkoff\Entities\PaymentEntity;
use App\Services\Tinkoff\Enums\PaymentStatusEnum;
use App\Services\Tinkoff\Exceptions\TinkoffException;
use App\Services\Tinkoff\TinkoffClient;
use App\Services\Tinkoff\TinkoffService;

class CancelPaymentAction
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

    /**
     * @throws TinkoffException
     */
    public function run(string $id): PaymentEntity
    {
        $response = TinkoffClient::make($this->tinkoff)
            ->post('Cancel', [
                'TerminalKey' => $this->tinkoff->config->terminal,
                'PaymentId' => $id,
            ]);

        return new PaymentEntity(
            $response['PaymentId'],
            PaymentStatusEnum::from($response['Status']),
            $response['OrderId'],
            $response['NewAmount'],
        );
    }
}
