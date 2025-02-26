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
        Schema::create('level_achievements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('lesson_id');
            $table->integer('wpm')->default(0);
            $table->string('duration')->default('00:00');
            $table->integer('accuracy')->default(0);
            $table->integer('typos')->default(0);
            $table->integer('total_words')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_achievements');
    }
};
