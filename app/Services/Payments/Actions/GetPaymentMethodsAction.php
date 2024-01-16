<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Models\Payment;
use App\Services\Payments\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class GetPaymentMethodsAction
{
    private string|null $currency = null;

    private bool|null $active = null;

    private int|null $id = null;

    public function currency(string $currency): static
    {
        $this->currency = $currency;
        return $this;
    }

    public function active(bool $active = true): static
    {
        $this->active = $active;
        return $this;
    }

    public function id(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function get(): Collection|array
    {
        return $this->query()->get();
    }

    public function first(): PaymentMethod|null
    {
        return $this->query()->first();
    }

    private function query(): Builder
    {
        $query = PaymentMethod::query();

        if (!is_null($this->currency))
        {
            $query->where('driver_currency_id', $this->currency);
        }

        if (!is_null($this->active))
        {
            $query->where('active', $this->active);
        }

        if (!is_null($this->id))
        {
            $query->where('id', $this->id);
        }

        return $query;
    }
}
