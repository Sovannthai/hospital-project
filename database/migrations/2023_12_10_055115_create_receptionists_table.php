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
        Schema::create('receptionists', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('gender')->default('Man');
            $table->date('dob');
            $table->string('phone', 15);
            $table->integer('disease_id');
            $table->integer('doctor_id')->nullable();
            $table->integer('nurse_id')->nullable();
            $table->longText('address');
            $table->enum('status', ['canceled','pending', 'processing', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetionists');
    }
};
