<?php
declare(strict_types=1);


namespace App\Http\Entities;


class TelegramBotChatEntity
{
    public int $id;
    public string $first_name;
    public string $last_name;
    public string $username;
    public string $type;
}
