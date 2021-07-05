<?php
declare(strict_types=1);


namespace App\Http\Entities;


class TelegramBotUpdatesEntity
{

    public int $update_id;
    public TelegramBotMessageEntity $telegramBotMessageEntity;

}
