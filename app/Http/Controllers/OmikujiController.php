<?php

namespace App\Http\Controllers;

use App\Models\Omikuji;
use App\Models\OmikujiProbability;
use App\Traits\OmikujiMessage;

class OmikujiController extends Controller
{
    use OmikujiMessage;

    public function index()
    {
        $omikujis = Omikuji::orderBy('created_at', 'desc')->take(10)->get();
        return view('omikuji.index', ['omikujis' => $omikujis]);
    }

    public function draw($page)
    {
        $probability = OmikujiProbability::where('page', $page)->first();

        if (!$probability) {
            abort(404);
        }

        $rand = mt_rand(1, 100);

        if ($rand <= $probability->probability_great_luck) {
            $result = '大吉';
        } elseif ($rand <= $probability->probability_great_luck + $probability->probability_middle_luck) {
            $result = '中吉';
        } elseif ($rand <= $probability->probability_great_luck + $probability->probability_middle_luck + $probability->probability_small_luck) {
            $result = '小吉';
        } else {
            $result = '凶';
        }

        Omikuji::create([
            'result' => $result,
            'page' => $page,
        ]);

        return view('omikuji.result', [
            'result' => $result,
            'message' => $this->getResultMessage($result),
        ]);
    }
}