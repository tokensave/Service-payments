<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Contracts\Payable;
use App\Services\Payments\Enums\PaymentStatusEnum;
use App\Services\Payments\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CreatePaymentAction
{
    private readonly Payable $payable;

    public function payable(Payable $payable): static
    {
        $this->payable = $payable;

        return $this;
    }

    public function run(): Builder|Model
    {
        return Payment::query()
            ->create([
                'uuid' => (string)Str::uuid(),
                'status' => PaymentStatusEnum::pending,
                'currency_id' => $this->payable->getPayableCurrencyId(),
                'amount' => $this->payable->getPayableAmount(),
                'payable_type' => $this->payable->getPayableType(),
                'payable_id' => $this->payable->getPayableId(),
                'method_id' => null,
                'driver' => null,
            ]);
    }
}
