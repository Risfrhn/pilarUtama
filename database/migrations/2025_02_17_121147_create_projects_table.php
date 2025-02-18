<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title1');
            $table->text('description1');
            $table->string('title2')->nullable();
            $table->text('description2')->nullable();
            $table->string('jenis_projek');
            $table->date('target_pengerjaan_start');
            $table->date('target_pengerjaan_end');
            $table->enum('status', ['ongoing', 'being_design', 'finished', 'negotiation']);
            $table->string('gambarflyer')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
