<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OmikujiProbability;

class OmikujiProbabilitySeeder extends Seeder
{
    public function run()
    {
        OmikujiProbability::create([
            'page' => 'default',
            'probability_great_luck' => 10,
            'probability_middle_luck' => 30,
            'probability_small_luck' => 50,
            'probability_bad_luck' => 10,
        ]);

        OmikujiProbability::create([
            'page' => 'great',
            'probability_great_luck' => 50,
            'probability_middle_luck' => 30,
            'probability_small_luck' => 15,
            'probability_bad_luck' => 5,
        ]);

        OmikujiProbability::create([
            'page' => 'middle',
            'probability_great_luck' => 20,
            'probability_middle_luck' => 40,
            'probability_small_luck' => 30,
            'probability_bad_luck' => 10,
        ]);

        OmikujiProbability::create([
            'page' => 'small',
            'probability_great_luck' => 5,
            'probability_middle_luck' => 25,
            'probability_small_luck' => 60,
            'probability_bad_luck' => 10,
        ]);

        OmikujiProbability::create([
            'page' => 'bad',
            'probability_great_luck' => 1,
            'probability_middle_luck' => 9,
            'probability_small_luck' => 30,
            'probability_bad_luck' => 60,
        ]);
    }
}