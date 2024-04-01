<?php

namespace Tests\Unit;

use App\Services\OmikujiProbability;
use PHPUnit\Framework\TestCase;

class OmikujiProbabilityTest extends TestCase
{
    public function testGetProbabilities()
    {
        $probabilities = ['大吉' => 10, '中吉' => 30, '小吉' => 50, '凶' => 10];
        $omikujiProbability = new OmikujiProbability($probabilities);
        $this->assertEquals($probabilities, $omikujiProbability->getProbabilities());
    }

    public function testGetResult()
    {
        $probabilities = ['大吉' => 100, '中吉' => 0, '小吉' => 0, '凶' => 0];
        $omikujiProbability = new OmikujiProbability($probabilities);
        $this->assertEquals('大吉', $omikujiProbability->getResult());
    }

    public function testSumOfProbabilitiesIsNot100()
    {
        $this->expectException(\Exception::class);
        $probabilities = ['大吉' => 10, '中吉' => 30, '小吉' => 50, '凶' => 20];
        new OmikujiProbability($probabilities);
    }
}
