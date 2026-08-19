<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('palash_applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('business_name')->nullable();
            $table->string('mobile');
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('district');
            $table->string('thana');
            $table->text('address');
            $table->json('services')->nullable();
            $table->string('has_business')->default('no');
            $table->string('experience_years')->nullable();
            $table->string('space')->default('looking');
            $table->text('comments')->nullable();
            $table->string('status')->default('new');
            $table->text('notes')->nullable();
            $table->longText('raw_message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('palash_applications');
    }
};