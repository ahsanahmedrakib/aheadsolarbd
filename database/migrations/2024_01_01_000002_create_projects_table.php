<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_url')->nullable();
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('client')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->longText('project_details')->nullable();
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};