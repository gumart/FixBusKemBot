<?php
declare(strict_types=1);


namespace App\Http\Services;

use App\Models\User;
use phpDocumentor\Reflection\Types\Null_;

class UserService
{

    public function updateOrCreate(array $messages): array
    {
        $result = [];

        foreach ($messages as $message) {
            $user = $message->from;

            $userId = $user->id;

            $status = User::updateOrCreate([
                'chat_id'=>$userId],
                [
                    'first_name'=>$user->first_name,
                    'last_name'=>$user->last_name,
                    'username'=>$user->username,
                    'chat_id'=>$message->chat->chat_id])->status;

            $result[] = ['id'=>$userId, 'text'=>$message->text, 'status'=>$status];
        }
    }
}
