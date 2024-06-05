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
        Schema::table('requests', function (Blueprint $table) {
            $table->foreign(['applicant'], 'requests_ibfk_1')->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['requested'], 'requests_ibfk_2')->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['event'], 'requests_ibfk_3')->references(['id'])->on('events')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropForeign('requests_ibfk_1');
            $table->dropForeign('requests_ibfk_2');
            $table->dropForeign('requests_ibfk_3');
        });
    }
};
