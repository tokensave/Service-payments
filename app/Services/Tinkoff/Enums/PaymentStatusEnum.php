<?php

namespace App\Services\Tinkoff\Enums;

enum PaymentStatusEnum: string
{
    case NEW = 'NEW';
    case FORM_SHOWED = 'FORM_SHOWED';
    case REJECTED = 'REJECTED';
    case CONFIRMED = 'CONFIRMED';
    case AUTHORIZED = 'AUTHORIZED';
    case CANCELED = 'CANCELED';
    case REVERSED = 'REVERSED';
    case REFUNDED = 'REFUNDED';
}
