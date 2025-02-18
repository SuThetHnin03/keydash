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
            $table->integer('level_id');
            $table->string('wpm');
            $table->string('duration');
            $table->string('accuracy');
            $table->string('typos');
            $table->string('total_words');
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
