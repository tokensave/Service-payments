<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUserCommand extends Command
{

    protected $signature = 'create:admin';

    public function handle()
    {
        $user = new User();
        $user->first_name = $this->ask('Имя', 'Admin');
        $user->email = $this->ask('Email', 'test@foo.bar');
        $user->password = $this->ask('Пароль', '12345secret');
        $user->save();

        $this->info('Админ создан');
    }
}
