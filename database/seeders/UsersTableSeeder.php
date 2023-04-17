<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id' => 2,
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
        ];
     
        User::insert($users);
    }
}
