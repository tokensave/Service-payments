<?php

namespace App\Services\Subscriptions\Models;

use App\Services\Payments\Contracts\Payable;
use App\Services\Subscriptions\Enums\SubscriptionStatusEnum;
use App\Support\Values\AmountValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model implements Payable
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'currency_id',
        'price',
        'status'
    ];

    protected $casts = [
        'status' => SubscriptionStatusEnum::class,
        'price' => AmountValue::class
    ];

    public function getPayableName(): string
    {
        return 'Подписка';
    }

    public function getPayableCurrencyId(): string
    {
        return $this->currency_id;
    }

    public function getPayableAmount(): AmountValue
    {
        return $this->price;
    }

    public function getPayableType(): string
    {
        return $this->getMorphClass();
    }

    public function getPayableId(): int
    {
        return $this->id;
    }

    public function getPayableUrl(): string
    {
        return route('subscriptions.show', $this);
    }

    public function onPaymentComplete(): void
    {
        // TODO: Implement onPaymentComplete() method.
    }
}
