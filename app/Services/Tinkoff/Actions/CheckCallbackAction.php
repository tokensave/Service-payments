<?php

namespace App\Services\Tinkoff\Actions;

use App\Services\Tinkoff\Entities\PaymentEntity;
use App\Services\Tinkoff\Enums\PaymentStatusEnum;
use App\Services\Tinkoff\Exceptions\InvalidTokenException;
use App\Services\Tinkoff\Exceptions\TinkoffException;
use App\Services\Tinkoff\TinkoffClient;
use App\Services\Tinkoff\TinkoffService;

class CheckCallbackAction
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
    public function run(array $data): PaymentEntity
    {
        $token = TinkoffClient::make($this->tinkoff)
            ->createToken($data);

        if($data['Token'] != $token){
            throw new InvalidTokenException(
                'Токен не верный',);
        }
        return new PaymentEntity(
            $data['PaymentId'],
            PaymentStatusEnum::from($data['Status']),
            $data['OrderId'],
            $data['Amount'],
        );
    }
}
