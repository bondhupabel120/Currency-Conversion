<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'User A',
               'email'=>'usera@gmail.com',
               'wallet' => '1000',
               'currency' => 'USD',
               'password'=> bcrypt('usera@gmail.com'),
            ],
            [
               'name'=>'User B',
               'email'=>'userb@gmail.com',
               'wallet' => '1000',
               'currency' => 'EUR',
               'password'=> bcrypt('userb@gmail.com'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
