<?php
declare(strict_types=1);


namespace App\Http\Bot\Commands\Commands;


use App\Http\Services\TelegramBotService;

abstract class BaseBotChatCommand
{
     protected string $command;

     public function __construct(string $command)
     {
        $this->command = $command;
     }

    abstract protected function handle(TelegramBotService $telegramBotService): bool;

    public function tryProcess(string $command): bool
    {
        return $this->handle(app(TelegramBotService::class));
    }
}
