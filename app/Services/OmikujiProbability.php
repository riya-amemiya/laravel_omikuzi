<?php

namespace App\Services;

class OmikujiProbability
{
    private $probabilityGreatLuck;
    private $probabilityMiddleLuck;
    private $probabilitySmallLuck;
    private $probabilityBadLuck;

    public function __construct($probabilityGreatLuck, $probabilityMiddleLuck, $probabilitySmallLuck, $probabilityBadLuck)
    {
        $this->probabilityGreatLuck = $probabilityGreatLuck;
        $this->probabilityMiddleLuck = $probabilityMiddleLuck;
        $this->probabilitySmallLuck = $probabilitySmallLuck;
        $this->probabilityBadLuck = $probabilityBadLuck;
    }

    public function getProbabilityGreatLuck()
    {
        return $this->probabilityGreatLuck;
    }

    public function getProbabilityMiddleLuck()
    {
        return $this->probabilityMiddleLuck;
    }

    public function getProbabilitySmallLuck()
    {
        return $this->probabilitySmallLuck;
    }

    public function getProbabilityBadLuck()
    {
        return $this->probabilityBadLuck;
    }
}