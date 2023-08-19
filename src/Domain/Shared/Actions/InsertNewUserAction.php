<?php

namespace Domain\Shared\Actions;


use Domain\Shared\Models\User;
use Domain\Shared\DataTransferObjects\UserData;

class InsertNewUserAction {

    static function execute(UserData $userData):User
    {   

        return User::create([
            ...$userData->toArray(),
            'password' => \Hash::make($userData->password),
        ]);

    }

}