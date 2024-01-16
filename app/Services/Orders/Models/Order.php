<?php

namespace App\Services\Orders\Models;

use App\Services\Orders\Enums\OrderStatusEnum;
use App\Services\Orders\OrderService;
use App\Services\Payments\Contracts\Payable;
use App\Support\Values\AmountValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Order extends Model implements Payable
{
    use HasFactory;

    protected $fillable =
        [
            'uuid',
            'status',
            'currency_id',
            'amount'
        ];

    protected $casts =
        [
            'status' => OrderStatusEnum::class,
            'amount' => AmountValue::class
        ];

    public function getPayableName(): string
    {
        return "Заказ {$this->uuid}";
    }

    public function getPayableCurrencyId(): string
    {
        return $this->currency_id;
    }

    public function getPayableAmount(): AmountValue
    {
        return $this->amount;
    }

    public function getPayableType(): string
    {
        return $this->getMorphClass(); //возвращает класс
    }

    public function getPayableId(): int
    {
        return $this->id;
    }

    public function getPayableUrl(): string
    {
        return route('orders.show', $this->uuid);
    }

    public function onPaymentComplete(): void
    {
        $orderService = new OrderService;
        $orderService->completeOrder()->run($this);
    }
}
