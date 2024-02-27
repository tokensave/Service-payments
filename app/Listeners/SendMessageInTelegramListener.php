<?php

namespace App\Listeners;

use App\Events\NotificationInTelegramEvent;
use App\Notifications\Telegram\Telegram;
use Exception;

class SendMessageInTelegramListener
{

    private string $token;
    private string $chat_id;

    public function __construct()
    {
        $this->token = config('notifications.telegram.token');
        $this->chat_id = config('notifications.telegram.chat_id');
    }

    /**
     * Handle the event.
     * @throws Exception
     */
    public function handle(NotificationInTelegramEvent $event): void
    {
        $notification = new Telegram($this->token, $this->chat_id);
        $notification->send('The '. $event->payable_type .' '. $event->uuid .' was paid by '. $event->driver .'. Check it!', ["to" => $this->chat_id]);
    }
}
