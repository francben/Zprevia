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
        Schema::table('event_custom_fields', function (Blueprint $table) {
            $table->foreign(['event'], 'event_custom_fields_ibfk_1')->references(['id'])->on('events')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['custom_field'], 'event_custom_fields_ibfk_2')->references(['id'])->on('custom_field')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_custom_fields', function (Blueprint $table) {
            $table->dropForeign('event_custom_fields_ibfk_1');
            $table->dropForeign('event_custom_fields_ibfk_2');
        });
    }
};
