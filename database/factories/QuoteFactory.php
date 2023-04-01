<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class QuoteFactory extends Factory
{
    public function definition()
    {
        return [
            'text' => $this->faker->text,
            'author' => $this->faker->name,
            'user_id' => User::factory(),
        ];
    }
}