<?php
declare(strict_types=1);


namespace App\Http\Services;

use App\Http\Clients\TelegramBotClient;
use App\Http\Entities\TelegramBotChatEntity;
use App\Http\Entities\TelegramBotUpdatesEntity;

class TelegramBotService
{
    private TelegramBotClient $telegramBotClient;

    public function __construct(TelegramBotClient $telegramBotClient)
    {
        $this->telegramBotClient = $telegramBotClient;
    }

    public function sendPrivateMessage(int $chat_id, string $text): bool
    {
        $this->telegramBotClient->sendMessage(compact('chat_id', 'text'));
    }

    public function getMessages(int $offset): array
    {
        $userService = new UserService();

        return $userService->updateOrCreate($this->telegramBotClient->getMessages(compact('offset')));
    }
}
