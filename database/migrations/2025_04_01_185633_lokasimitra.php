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
        Schema::table('lokasi_mitras', function (Blueprint $table) {
            $table->string('nama')->after('id');
            $table->string('kota')->after('nama');
            $table->string('latitude')->after('kota');
            $table->string('longitude')->after('latitude');
            $table->string('linkmaps')->after('longitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lokasi_mitras', function (Blueprint $table) {
            //
        });
    }
};
