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
        Schema::table('calon_mitras', function (Blueprint $table) {
            $table->string('phone')->after('email');
            $table->string('kota')->after('phone');
            $table->enum('status', ['unread', 'read'])->after('kota')->default('unread');
            $table->string('readby')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calon_mitras', function (Blueprint $table) {
            //
        });
    }
};
