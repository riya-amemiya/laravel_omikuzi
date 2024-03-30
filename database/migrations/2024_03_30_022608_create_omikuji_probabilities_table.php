<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('omikuji_probabilities', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->integer('probability_great_luck');
            $table->integer('probability_middle_luck');
            $table->integer('probability_small_luck');
            $table->integer('probability_bad_luck');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('omikuji_probabilities');
    }
};