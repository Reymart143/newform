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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->integer('age');
            $table->string('number');
            $table->date('birthdate');
            $table->string('bloodtype');
            $table->string('username');
            $table->string('password');
            $table->string('region');
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('purok');
            $table->string('image');
            $table->string('location');
            
            $table->boolean('role')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
