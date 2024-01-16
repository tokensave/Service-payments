<?php

namespace App\Services\Payments\Models;

use App\Services\Payments\Enums\PaymentDriverEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property boolean $active
 * @property PaymentDriverEnum $driver
 */
class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'active',
        'driver',
        'driver_currency_id'
    ];

    protected $casts = [
        'active' => 'boolean',
        'driver' => PaymentDriverEnum::class
    ];
}
