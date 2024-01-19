<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LotteryGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        DB::table('lottery_games')->insert([
//            [
//                'name' => 'Poker',
//                'gamer_count' => 10,
//                'reward_points' => 150
//            ],
//            [
//                'name' => 'Roulette',
//                'gamer_count' => 10,
//                'reward_points' => 150
//            ]
//        ]);

        \App\Models\LotteryGame::factory(10)->create();
    }
}
