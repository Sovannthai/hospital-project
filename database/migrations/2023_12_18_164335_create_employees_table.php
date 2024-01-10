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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->enum('gender', ['Male', 'Female', 'Optional'])->default('Male');
            $table->enum('mt_status', ['Single', 'Married', 'Widow', 'Optional'])->default('Single');
            $table->date('dob');
            $table->bigInteger('phone')->nullable();
            $table->decimal('salary', 10, 2);
            $table->date('join_date');
            $table->longText('address');
            $table->boolean('status')->default(true);
            $table->integer('emp_group_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
