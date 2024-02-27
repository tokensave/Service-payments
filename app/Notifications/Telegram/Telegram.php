<?php

namespace App\Notifications\Telegram;

use Exception;
use Illuminate\Support\Facades\Http;

class Telegram
{
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @throws Exception
     */
    public function send($message, $params = []): void
    {
        $url = "https://api.telegram.org/bot" . $this->token . "/sendMessage";

        $params =
            [
                'chat_id' => $params['to'],
                "text" => $message,
                "parse_mode" => "HTML",
                "disable_web_page_preview" => true
            ];

        $result = Http::post($url, $params);

        if (!$result['ok']) {
            throw new Exception($result['description'], $result['error_code']);
        }
    }

//    public function send()
//    {
//
////
//    }
}
