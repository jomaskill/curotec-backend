<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'   => $this->faker->title(),
            'body'    => $this->faker->paragraph(),
            'user_id' => User::factory(),
        ];
    }
}
