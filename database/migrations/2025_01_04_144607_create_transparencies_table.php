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
        Schema::create('transparencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transparency_id');
            $table->string('title');
            $table->string('file');
            $table->string('description')->nullable();
            $table->foreign('transparency_id')->references('id')->on('transparency_titles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transparencies');
    }
};
