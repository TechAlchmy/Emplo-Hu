<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('jobs', function (Blueprint $table) {
            $table->uuid('uuid')->after('id')->unique()->nullable();
        });

        Artisan::call('emplo:create-uuids');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};