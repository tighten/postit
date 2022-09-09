<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:create';

    protected $description = 'Create a User in the database.';

    public function handle()
    {
        $name = $this->ask('Name ?');
        $email = $this->ask('Email ?');
        $password = $this->secret('Password ?');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        return 0;
    }
}
