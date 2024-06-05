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
        Schema::create('delegate_events', function (Blueprint $table) {
            $table->integer('event');
            $table->integer('delegate')->index('delegate');
            $table->integer('paid')->default(0);
            $table->text('ticket')->nullable();

            $table->primary(['event', 'delegate']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delegate_events');
    }
};
