<?php
declare(strict_types=1);


namespace App\Http\Bot\Commands;


use App\Http\Services\TelegramBotService;

class StartCommand extends BaseBotChatCommand
{

    protected function handle(TelegramBotService $telegramBotService): bool
    {
        
    }
}
