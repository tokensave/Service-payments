<?php

namespace App\Services\Orders\Listeners;

use App\Events\NotificationInTelegramEvent;
use App\Notifications\Telegram\Telegram;
use App\Services\Orders\Models\Order;
use App\Services\Orders\OrderService;
use App\Services\Payments\Events\PaymentCompletedEvent;
use Exception;

class CompleteOrderListener
{

    public function __construct(
        private OrderService $orderService,)
    {

    }

    /**
     * @throws \Exception
     */
    public function handle(PaymentCompletedEvent $event): void
    {
        $payableType = $event->data->payableType;
        $payableId = $event->data->payableId;

        if ($payableType !== (new Order)->getPayableType()) {
            return;
        }

        if ($order = Order::query()->find($payableId)) {
            $this->orderService->completeOrder()->run($order);
            event(new NotificationInTelegramEvent($payableType, $order->uuid, $event->data->driver));
        } else {
            throw new Exception();
        }
    }
}
