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
        Schema::create('landing_data', function (Blueprint $table) {
            $table->id();
            
            // Flyer
            $table->string('flyer_image')->nullable();
            
            // About Us
            $table->text('about_us_desk1')->nullable();
            $table->string('about_us_image')->nullable();
            $table->text('about_us_desk2')->nullable();

            // Arsitektur
            $table->text('architectur_desk')->nullable();
            $table->string('architectur_image')->nullable();

            // Interior
            $table->text('interior_desk')->nullable();
            $table->string('interior_image')->nullable();

            // Landscape
            $table->text('landscape_desk')->nullable();
            $table->string('landscape_image')->nullable();

            // Renovasi
            $table->text('renovation_desk')->nullable();
            $table->string('renovation_image')->nullable();

            // Commercial Build
            $table->text('comercial_build_desk')->nullable();
            $table->string('comercial_build_image')->nullable();

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_data');
    }
};
