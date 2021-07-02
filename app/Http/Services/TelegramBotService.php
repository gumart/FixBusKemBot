<?php
declare(strict_types=1);


namespace App\Http\Services;

use App\Http\Clients\TelegramBotClient;

class TelegramBotService
{
    private TelegramBotClient $telegramBotClient;

    public function __construct(TelegramBotClient $telegramBotClient)
    {
        $this->telegramBotClient = $telegramBotClient;
    }

    public function sendPrivateMessage(int $chat_id, string $text)
    {
        $this->telegramBotClient->postRequest('sendMessage', compact('chat_id', 'text'));
    }
}
