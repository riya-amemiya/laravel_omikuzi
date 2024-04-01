<?php

namespace Tests\Unit;

use App\Traits\OmikujiResult;
use PHPUnit\Framework\TestCase;

class OmikujiResultTest extends TestCase
{
    use OmikujiResult;
    public function testGetMessage()
    {
        $this->assertEquals('おめでとうございます！大吉です！', $this->getMessage('大吉'));
        $this->assertEquals('中吉です。いいことがありそうです。', $this->getMessage('中吉'));
        $this->assertEquals('小吉です。日常に小さな幸せがありますように。', $this->getMessage('小吉'));
        $this->assertEquals('凶です。気をつけましょう。', $this->getMessage('凶'));
        $this->assertEquals('結果が見つかりませんでした。', $this->getMessage('無効な結果'));
    }
}
