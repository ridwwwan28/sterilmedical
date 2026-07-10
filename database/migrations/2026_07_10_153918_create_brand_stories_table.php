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
        Schema::create('brand_stories', function (Blueprint $table) {
            $table->id();
            // Header
            $table->string('header_title')->nullable();
            $table->text('header_description')->nullable();
            
            // Vision
            $table->string('vision_image')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            
            // Mission
            $table->string('mission_image')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            
            // Timeline
            $table->string('timeline_title')->nullable();
            $table->string('timeline_subtitle')->nullable();
            $table->json('timeline_items')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_stories');
    }
};
