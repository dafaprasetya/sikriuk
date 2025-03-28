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
        Schema::table('email_abouts', function (Blueprint $table) {
            $table->string('nama')->nullable()->change();
        });
        Schema::table('phone_abouts', function (Blueprint $table) {
            $table->string('nama')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('email_abouts', function (Blueprint $table) {
            //
        });
    }
};
