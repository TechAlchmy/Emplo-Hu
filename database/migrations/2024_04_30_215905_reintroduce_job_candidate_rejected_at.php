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
        Schema::table('job_candidates', function (Blueprint $table) {
            $table->timestamp('rejected_at')->nullable()->after('job');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_candidates', function (Blueprint $table) {
            $table->timestamp('rejected_at')->default(NULL);
        });
    }
};
