<?php

namespace App\Services;

class OmikujiResult
{

    public function getMessage($result)
    {
        switch ($result) {
            case '大吉':
                return 'おめでとうございます！大吉です！';
            case '中吉':
                return '中吉です。いいことがありそうです。';
            case '小吉':
                return '小吉です。日常に小さな幸せがありますように。';
            case '凶':
                return '凶です。気をつけましょう。';
            default:
                return '結果が見つかりませんでした。';
        }
    }
}