<?php

namespace Tests\Feature;

use App\Models\Omikuji;
use App\Repositories\OmikujiRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OmikujiRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use OmikujiRepository;
    use WithFaker;

    public function testGetRecentOmikujis()
    {
        $now = now();
        $omikujis = Omikuji::factory()->count(15)->make()->each(function ($omikuji, $index) use ($now) {
            $omikuji->created_at = $now->subMinutes($index);
            $omikuji->updated_at = $now->subMinutes($index);
        });
        Omikuji::insert($omikujis->toArray());

        $recentOmikujis = $this->getRecentOmikujis();
        $this->assertCount(10, $recentOmikujis);
        $this->assertTrue($recentOmikujis->first()->created_at->gt($recentOmikujis->last()->created_at));
    }
    public function testCreateOmikuji()
    {
        $result = '大吉';
        $page = 'default';
        $this->createOmikuji($result, $page);
        $this->assertDatabaseHas('omikujis', [
            'result' => $result,
            'page' => $page,
        ]);
    }

    public function testResetOmikujis()
    {
        Omikuji::factory()->count(5)->create();
        $this->resetOmikujis();
        $this->assertDatabaseCount('omikujis', 0);
    }
}
