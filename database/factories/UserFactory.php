<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstname(100),
            'last_name' => $this->faker->lastname(100),
            'email' => $this->faker->email(),
            'password' => static::$password ??= Hash::make('password'),
            'is_admin' => random_int(0,1),
            'points' => random_int(1,100)
        ];
    }
}
