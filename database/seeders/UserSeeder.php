<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = [
            [
                'name' => 'Hamba Allah',
                'email' => 'adminhh@gmail.com',
                'phone' => '0812345678901',
                'password' => bcrypt('hhebatadmin'),
                'role' => 'admin',
            ],
            [
                'name' => 'Daniel',
                'email' => 'daniel14@gmail.com',
                'phone' => '0812345678901',
                'role' => 'customer',
                'password' => bcrypt('danielqwe'),
            ],
            [
                'name' => 'Muhammad Fauzan',
                'email' => 'fauzan14072004@gmail.com',
                'phone' => '0812345678901',
                'role' => 'customer',
                'password' => bcrypt('mfau1407'),
            ],
            [
                'name' => 'Receptionis',
                'email' => 'receptionis@gmail.com',
                'phone' => '0812345678901',
                'role' => 'resepsionis',
                'password' => bcrypt('hhebatreceptionis'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
