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
        $user->first_name = $this->ask('Имя', 'Roman');
        $user->email = $this->ask('Email', 'test@foo.bar');
        $user->password = $this->ask('Пароль', '1234567890');
        $user->save();

        $this->info('Админ создан');
    }
}
