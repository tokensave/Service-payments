<?php

namespace App\Services\Currencies\Models;

use App\Services\Currencies\Sources\SourceEnum;
use App\Support\Values\AmountValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property string $id
 * @property string $name
 * @property AmountValue $price
 * @property SourceEnum $source
 */
class Currency extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'price',
        'source'
    ];

    protected $casts = [
        'price' => AmountValue::class,
        'source' => SourceEnum::class,
    ];

    public const MAIN = 'RUB';
    public const RUB = 'RUB';
    public const USD = 'USD';
    public const EUR = 'EUR';

    public function isMain(): bool
    {
        return $this->id === static::MAIN;
    }

    public function isNotMain(): bool
    {
        return !$this->isMain();
    }

    public static function getCashed(): Collection
    {
        static $cashed;

        if ($cashed) {
            return $cashed;
        }

        return $cashed = static::all();
    }
}
