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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('sex', ['male', 'female'])->nullable();
            $table->string('marital_status')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();

            $table->string('farm_name')->nullable();
            $table->string('farm_location')->nullable();
            $table->string('farm_size')->nullable(); // Acres or Hectares
            $table->string('crop_type')->nullable();

            $table->enum('ownership_type', ['Registered Owner', 'Tenant', 'Lessee', 'Others'])->nullable();
            $table->string('name_of_owner')->nullable();

            $table->enum('farm_type', ['Irrigated', 'Rainfed Upland', 'Rainfed Lowland'])->nullable();



            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Link to users table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
