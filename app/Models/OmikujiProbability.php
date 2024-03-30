<?php

namespace App\Models;

class OmikujiProbability
{
    private $page;
    private $probabilityGreatLuck;
    private $probabilityMiddleLuck;
    private $probabilitySmallLuck;
    private $probabilityBadLuck;

    public function __construct($page, $probabilityGreatLuck, $probabilityMiddleLuck, $probabilitySmallLuck, $probabilityBadLuck)
    {
        $this->page = $page;
        $this->probabilityGreatLuck = $probabilityGreatLuck;
        $this->probabilityMiddleLuck = $probabilityMiddleLuck;
        $this->probabilitySmallLuck = $probabilitySmallLuck;
        $this->probabilityBadLuck = $probabilityBadLuck;
    }

    public function getPage()
    {
        return $this->page;
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