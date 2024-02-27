<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationInTelegramEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $payable_type;
    public string $uuid;
    public string $driver;

    public function __construct(string $payable_type,string $order_uuid, string $payment_driver)
    {
        $this->payable_type = $payable_type;
        $this->uuid = $order_uuid;
        $this->driver = $payment_driver;
    }

}
