<?php

namespace Database\Factories;

use App\Models\LotteryGame;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LotteryGame>
 */
class LotteryGameFactory extends Factory
{
    protected $model = LotteryGame::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(80),
            'gamer_count' => random_int(1,10),
            'reward_points' => random_int(100,1000)
        ];
    }
}
