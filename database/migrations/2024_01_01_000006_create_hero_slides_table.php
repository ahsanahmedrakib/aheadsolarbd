<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable();
            $table->string('title');
            $table->string('title_accent')->nullable();
            $table->text('description')->nullable();
            $table->string('background_video')->nullable();
            $table->string('site')->default('ahead');
            $table->string('video_url')->nullable();
            $table->boolean('show_video_button')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};