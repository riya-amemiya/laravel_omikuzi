<?php

namespace App\Services;

class OmikujiProbability
{
    private $probabilities;

    public function __construct($probabilities)
    {
        // 合計が100じゃない場合は例外を投げる
        if (array_sum($probabilities) !== 100) {
            throw new \Exception('The sum of probabilities must be 100.');
        }
        $this->probabilities = $probabilities;
    }

    public function getProbabilities()
    {
        return $this->probabilities;
    }

    public function getResult()
    {
        $rand = random_int(1, 100);
        $cumulativeProbability = 0;

        foreach ($this->probabilities as $result => $probability) {
            $cumulativeProbability += $probability;
            if ($rand <= $cumulativeProbability) {
                return $result;
            }
        }
    }
}
