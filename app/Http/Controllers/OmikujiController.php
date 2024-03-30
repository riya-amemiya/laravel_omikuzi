<?php

namespace App\Http\Controllers;

use App\Models\Omikuji;
use App\Models\OmikujiProbability;
use App\Traits\OmikujiMessage;

class OmikujiController extends Controller
{
    use OmikujiMessage;

    private $omikujiProbabilities;

    public function __construct()
    {
        $this->omikujiProbabilities = [
            'default' => new OmikujiProbability('default', 10, 30, 50, 10),
            'great' => new OmikujiProbability('great', 50, 30, 15, 5),
            'middle' => new OmikujiProbability('middle', 20, 40, 30, 10),
            'small' => new OmikujiProbability('small', 5, 25, 60, 10),
            'bad' => new OmikujiProbability('bad', 1, 9, 30, 60),
        ];
    }

    public function index()
    {
        $omikujis = Omikuji::orderBy('created_at', 'desc')->take(10)->get();
        return view('omikuji.index', ['omikujis' => $omikujis]);
    }

    public function draw($page)
    {
        $probability = $this->omikujiProbabilities[$page] ?? null;

        if (!$probability) {
            abort(404);
        }

        $rand = random_int(1, 100);

        if ($rand <= $probability->getProbabilityGreatLuck()) {
            $result = '大吉';
        } elseif ($rand <= $probability->getProbabilityGreatLuck() + $probability->getProbabilityMiddleLuck()) {
            $result = '中吉';
        } elseif ($rand <= $probability->getProbabilityGreatLuck() + $probability->getProbabilityMiddleLuck() + $probability->getProbabilitySmallLuck()) {
            $result = '小吉';
        } else {
            $result = '凶';
        }

        Omikuji::create([
            'result' => $result,
            'page' => $page
        ]);

        return view('omikuji.result', [
            'result' => $result,
            'page' => $page,
            'message' => $this->getResultMessage($result),
        ]);
    }
    public function reset()
    {
        Omikuji::truncate();
        return redirect()->route('omikuji.index')->with('status', 'リセットしました。');
    }
}