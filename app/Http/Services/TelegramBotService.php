<?php
declare(strict_types=1);


namespace App\Http\Services;

use App\Http\Clients\TelegramBotClient;
use App\Http\Entities\TelegramBotChatEntity;
use App\Http\Entities\TelegramBotUpdatesEntity;

class TelegramBotService
{
    private TelegramBotClient $telegramBotClient;
    private UserService $userService;
    private MessageService $messageService;

    public function __construct(TelegramBotClient $telegramBotClient, UserService $userService, MessageService $messageService)
    {
        $this->telegramBotClient = $telegramBotClient;
        $this->userService = $userService;
        $this->messageService = $messageService;
    }

    public function sendPrivateMessage(int $chat_id, string $text): bool
    {
        $this->telegramBotClient->sendMessage(compact('chat_id', 'text'));
    }

    public function getMessages(int $offset): array
    {
        return $filtered_messages = $this->messageService->getUsersData($this->telegramBotClient->getMessages(compact('offset')));
//        return $this->messageService->filter($userService->updateOrCreate($this->telegramBotClient->getMessages(compact('offset'))));
    }
}
