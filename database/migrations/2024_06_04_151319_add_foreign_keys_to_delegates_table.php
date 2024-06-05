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
        Schema::table('delegates', function (Blueprint $table) {
            $table->foreign(['company'], 'delegates_ibfk_1')->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['user'], 'delegates_ibfk_2')->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delegates', function (Blueprint $table) {
            $table->dropForeign('delegates_ibfk_1');
            $table->dropForeign('delegates_ibfk_2');
        });
    }
};
