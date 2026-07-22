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
        Schema::create('qualities', function (Blueprint $table) {
            $table->id();
            
            // Header
            $table->string('header_title')->nullable();
            $table->string('header_subtitle')->nullable();
            $table->text('header_description')->nullable();
            
            // Certificate
            $table->string('certificate_image')->nullable();

            // Statistik Pencapaian (JSON: value, label)
            $table->json('achievements')->nullable();
            
            // Info Komunitas
            $table->string('info_title')->nullable();
            $table->text('info_description')->nullable();
            $table->json('info_images')->nullable();
            
            // Marquee Logos (JSON: image, alt_text)
            $table->string('trusted_title')->nullable();
            $table->json('trusted_logos')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualities');
    }
};
