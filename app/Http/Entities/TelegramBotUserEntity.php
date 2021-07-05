<?php
declare(strict_types=1);


namespace App\Http\Entities;


class TelegramBotUserEntity
{
    public int $id;
    public bool $is_bot;
    public string $first_name;
    public string $last_name;
    public string $username;
    public string $language_code;
}
