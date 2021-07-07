<?php
declare(strict_types=1);


namespace App\Http\Services;

use App\Models\User;
use phpDocumentor\Reflection\Types\Null_;

class UserService
{

    public function updateOrCreate(array $updates): array
    {
        $result = [];

        foreach ($updates as $update) {

            $user = $update->message->from;

            $userId = $update->message->from->id;

            $status = User::updateOrCreate([
                'chat_id'=>$userId],
                [
                    'first_name'=>$user->first_name,
                    'last_name'=>$user->last_name,
                    'username'=>$user->username,
                    'chat_id'=>$update->message->chat->id])->status;

            $result[] = ['id'=>$update->message->from->id, 'text'=>$update->message->text, 'status'=>$status];
        }

        return $result;
    }
}
