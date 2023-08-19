<?php

namespace App\Console\Commands\Shared;

use Domain\Shared\Actions\InsertNewUserAction;
use Domain\Shared\DataTransferObjects\UserData;
use Illuminate\Console\Command;

class InsertNewUserCommand extends Command
{
    protected $signature = 'shared:insert-new-user';
    protected $description = 'Create a new user and access token';

    public function handle()
    {
        $userData = [];
        
        $this->line('Inserting new user.');

        $userData['name'] = $this->ask("Enter full name");
        $userData['email'] = $this->ask("Enter email");
        $userData['password'] = $this->ask("Enter password");

        try {
            $userData = UserData::validateAndCreate($userData);
            $user = InsertNewUserAction::execute($userData);
            dump([
                'token' => str(($user->createToken('command'))->plainTextToken)
                                ->explode('|')->last(),
                 ...$user->only('name', 'email', 'id')
            ]);
        }catch(\Exception $e){
            $this->error('Something was wrong.');
            $this->error($e->getMessage());
        }
    }
}
