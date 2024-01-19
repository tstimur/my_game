<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        DB::table('users')->insert([
//            [
//                'first_name' => 'Tim',
//                'last_name' => 'Timov',
//                'email' => 'tim@mail.ru',
//                'password' => '12345678',
//                'is_admin' => 0,
//                'points' => 5000
//            ],
//            [
//                'first_name' => 'Boris',
//                'last_name' => 'Borisov',
//                'email' => 'boris@mail.ru',
//                'password' => '12345678',
//                'is_admin' => 0,
//                'points' => 1500
//            ]
//        ]);

        \App\Models\User::factory(10)->create();
    }
}
