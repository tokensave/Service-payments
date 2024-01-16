<?php

namespace App\Services\Payments\Contracts;

use App\Support\Values\AmountValue;

//Интерфейс для оплаты разных сущностей(подписка, товары и т.д.) Реализовани для гибкости
//Добавляем в каждую сущность которую нужно будет оплачивать
//Связанная модель платежа
interface Payable
{
    public function getPayableName(): string;

    public function getPayableCurrencyId(): string ;

    public function getPayableAmount(): AmountValue ;

    public function getPayableType(): string ;

    public function getPayableId(): int ;

    public function getPayableUrl(): string;

    public function onPaymentComplete(): void;

}
