<?php

namespace App\Services;

class OmikujiProbability
{
    private $probabilities;

    public function __construct($probabilities)
    {
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