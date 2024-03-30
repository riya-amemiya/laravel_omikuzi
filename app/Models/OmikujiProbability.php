<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OmikujiProbability extends Model
{
    protected $fillable = [
        'page',
        'probability_great_luck',
        'probability_middle_luck',
        'probability_small_luck',
        'probability_bad_luck',
    ];
}