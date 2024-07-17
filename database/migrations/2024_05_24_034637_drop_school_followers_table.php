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
        Schema::dropIfExists('school_followers');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('school_followers', function (Blueprint $table) {
            $table->id();
            $table->integer('school');
            $table->integer('user');
            $table->timestamps();
        });
    }
};