<?php

namespace App\Traits;

use App\Models\Omikuji;

trait OmikujiRepository
{
    public function getRecentOmikujis($limit = 10)
    {
        return Omikuji::orderBy('created_at', 'desc')->take($limit)->get();
    }

    public function createOmikuji($result, $page)
    {
        return Omikuji::create([
            'result' => $result,
            'page' => $page
        ]);
    }

    public function resetOmikujis()
    {
        Omikuji::truncate();
    }
}