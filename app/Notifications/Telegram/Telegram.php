<?php

namespace App\Notifications\Telegram;

use Exception;
use Illuminate\Support\Facades\Http;

class Telegram
{
    private $token;
    private $chat_id;

    public function __construct($token, $chat_id)
    {
        $this->token = $token;
        $this->chat_id = $chat_id;
    }

    /**
     * @throws Exception
     */
    public function send($message): void
    {
        $url = "https://api.telegram.org/bot" . $this->token . "/sendMessage";

        $params =
            [
                'chat_id' => $this->chat_id,
                "text" => $message,
                "parse_mode" => "HTML",
                "disable_web_page_preview" => true
            ];

        $result = Http::post($url, $params);

        if (!$result['ok']) {
            throw new Exception($result['description'], $result['error_code']);
        }
    }
}
