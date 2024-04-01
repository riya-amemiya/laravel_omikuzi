<?php

namespace Tests\Feature;

use App\Models\Omikuji;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OmikujiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get(route('omikuji.index'));
        $response->assertStatus(200);
        $response->assertViewIs('omikuji.index');
        $response->assertViewHas('omikujis');
    }

    public function testDraw()
    {
        $response = $this->post(route('omikuji.draw', ['page' => 'default']));
        $response->assertStatus(200);
        $response->assertViewIs('omikuji.result');
        $response->assertViewHas(['result', 'page', 'message']);
        $this->assertDatabaseHas('omikujis', ['page' => 'default']);
    }

    public function testDrawInvalidPage()
    {
        $response = $this->post(route('omikuji.draw', ['page' => 'invalid']));
        $response->assertStatus(404);
    }

    public function testReset()
    {
        Omikuji::factory()->count(5)->create();
        $response = $this->post(route('omikuji.reset'));
        $response->assertRedirect(route('omikuji.index'));
        $response->assertSessionHas('status', 'リセットしました。');
        $this->assertDatabaseCount('omikujis', 0);
    }
}
