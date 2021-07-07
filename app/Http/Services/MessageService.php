<?php
declare(strict_types=1);


namespace App\Http\Services;


class MessageService
{
    public function getUsersData(array $updates) : array
    {
        $result = [];

        foreach ($updates as $update) {
            $result[] = dump($update->message->from);
        }

        return $result;
    }
}
