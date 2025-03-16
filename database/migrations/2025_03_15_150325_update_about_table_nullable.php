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
        Schema::table('abouts', function (Blueprint $table) {
            Schema::table('abouts', function (Blueprint $table) {
                $table->string('nama')->nullable()->change();
                $table->string('logo')->nullable()->change();
                $table->string('moto')->nullable()->change();
                $table->text('deskripsi')->nullable()->change();
                $table->text('lokasi')->nullable()->change();
                $table->string('total_mitra')->nullable()->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('nama')->nullable(false)->change();
            $table->string('logo')->nullable(false)->change();
            $table->string('moto')->nullable(false)->change();
            $table->text('deskripsi')->nullable(false)->change();
            $table->text('lokasi')->nullable(false)->change();
            $table->string('total_mitra')->nullable(false)->change();
        });
    }
};
