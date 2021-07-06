<?php
declare(strict_types=1);


namespace App\Http\Services;


class MessageService
{
    public function filter(array $messages)
    {
        $userService = new UserService();

        return $userService->updateOrCreate($messages);
    }
}
