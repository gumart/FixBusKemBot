<?php
declare(strict_types=1);


namespace App\Http\Entities;


class TelegramBotMessageEntity
{

    public int $message_id;
    public int $date;
    public string $text;
    public TelegramBotUserEntity $telegramBotUserEntity;
    public TelegramBotChatEntity $telegramBotChatEntity;

}
