<?php

namespace Database\Factories;

use App\Models\Omikuji;
use Illuminate\Database\Eloquent\Factories\Factory;

class OmikujiFactory extends Factory
{
    protected $model = Omikuji::class;

    public function definition()
    {
        return [
            'result' => $this->faker->randomElement(['大吉', '中吉', '小吉', '凶']),
            'page' => $this->faker->randomElement(['default', 'great', 'middle', 'small', 'bad']),
        ];
    }
}
