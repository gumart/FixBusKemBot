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

    public function sendPrivateMessage(int $chat_id, string $text): bool
    {
        $this->telegramBotClient->postRequest('sendMessage', compact('chat_id', 'text'));
    }

    public function getMessages(int $offset): array
    {
        return $this->telegramBotClient->getRequest('getUpdates', compact('offset'));
    }
}
