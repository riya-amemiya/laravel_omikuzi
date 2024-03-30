<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\OmikujiController@index')->name('omikuji.index');
Route::post('/omikuji/draw/{page}', 'App\Http\Controllers\OmikujiController@draw')->name('omikuji.draw');