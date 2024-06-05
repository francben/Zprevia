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
        Schema::table('delegate_events', function (Blueprint $table) {
            $table->foreign(['event'], 'delegate_events_ibfk_1')->references(['id'])->on('events')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['delegate'], 'delegate_events_ibfk_2')->references(['id'])->on('delegates')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delegate_events', function (Blueprint $table) {
            $table->dropForeign('delegate_events_ibfk_1');
            $table->dropForeign('delegate_events_ibfk_2');
        });
    }
};
