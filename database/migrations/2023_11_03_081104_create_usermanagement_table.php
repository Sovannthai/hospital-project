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
        Schema::create('usermanagement', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('prefix');
            $table->string('name');
            $table->integer('user_type_id');
            $table->decimal('salary', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usermanagement');
    }
};
