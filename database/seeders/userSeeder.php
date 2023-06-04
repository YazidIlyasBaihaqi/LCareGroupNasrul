<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => "Yazid Ilyas Baihaqi",
            'email' => 'test@gmail.com',
            'password' => Hash::make('secret'),
            'role' => "Admin",
            'gender' => 'P',
            'tgl_lahir' => '2002-08-10',
            'hp' => '0881'
        ]);

        User::create([
            'username' => 'user2',
            'email' => 'test1@gmail.com',
            'password' => Hash::make('user'),
            'role' => "User",
            'gender' => 'P',
            'tgl_lahir' => '2002-08-10',
            'hp' => '0881'
        ]);
    }
}
