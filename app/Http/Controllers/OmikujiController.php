<?php

namespace App\Http\Controllers;

use App\Traits\OmikujiRepository;
use App\Services\OmikujiProbability;
use App\Services\OmikujiResult;

class OmikujiController extends Controller
{
    use OmikujiRepository;

    private $omikujiProbabilities;
    private $omikujiResult;

    public function __construct(OmikujiResult $omikujiResult)
    {
        $this->omikujiProbabilities = [
            'default' => new OmikujiProbability(['大吉' => 10, '中吉' => 30, '小吉' => 50, '凶' => 10]),
            'great' => new OmikujiProbability(['大吉' => 70, '中吉' => 20, '小吉' => 5, '凶' => 5]),
            'middle' => new OmikujiProbability(['大吉' => 20, '中吉' => 70, '小吉' => 5, '凶' => 5]),
            'small' => new OmikujiProbability(['大吉' => 10, '中吉' => 5, '小吉' => 70, '凶' => 15]),
            'bad' => new OmikujiProbability(['大吉' => 5, '中吉' => 5, '小吉' => 20, '凶' => 70]),
        ];
        $this->omikujiResult = $omikujiResult;
    }

    public function index()
    {
        $omikujis = $this->getRecentOmikujis();
        return view('omikuji.index', ['omikujis' => $omikujis]);
    }

    public function draw($page)
    {
        $probability = $this->omikujiProbabilities[$page] ?? null;

        if (!$probability) {
            abort(404);
        }

        $result = $probability->getResult();

        $this->createOmikuji($result, $page);

        return view('omikuji.result', [
            'result' => $result,
            'page' => $page,
            'message' => $this->omikujiResult->getMessage($result),
        ]);
    }

    public function reset()
    {
        $this->resetOmikujis();
        return redirect()->route('omikuji.index')->with('status', 'リセットしました。');
    }
}