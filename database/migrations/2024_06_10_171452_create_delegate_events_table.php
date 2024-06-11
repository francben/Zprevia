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
            $table->id();
            $table->unsignedBigInteger('event');
            $table->foreign('event')->references('id')->on('events');
            $table->unsignedBigInteger('delegate');
            $table->foreign('delegate')->references('id')->on('users');
            $table->boolean('paid')->default(0);
            $table->string('ticket')->nullable();
            
            $table->timestamps();
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
