<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Miguel',
            'phone' => '300756',
            'email' => 'super@gmail.com',
            'profile' => 'SUPER',
            'image' => 'avatar.jpg',
            'status' => 'ACTIVE',
            'password' => bcrypt('123'),
        ]);

        User::create([
            'name' => 'Fabian',
            'phone' => '300756',
            'email' => 'admin@gmail.com',
            'profile' => 'ADMIN',
            'image' => 'avatar.jpg',
            'status' => 'ACTIVE',
            'password' => bcrypt('123'),
        ]);

        User::create([
            'name' => 'Natalia',
            'phone' => '300756',
            'email' => 'vendedor@gmail.com',
            'profile' => 'EMPLOYEE',
            'image' => 'avatar.jpg',
            'status' => 'ACTIVE',
            'password' => bcrypt('123'),
        ]);
    }
}
