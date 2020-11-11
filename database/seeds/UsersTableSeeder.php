<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$hILhqGcP/im.ARSOwiQF8OZ8gkK8EtqAURjHN2FpnQuohHnvpgGiC',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
