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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            // $table->enum('avatar', ['avatar1', 'avatar2', 'avatar3'])->default('avatar1'); 
            $table->unsignedTinyInteger('avatar')->default(0); // 0, 1, 2
            // ha nem csak 3 előre meghatározott képből lehetne választani avatárt, akkor nem így tárolnám.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
