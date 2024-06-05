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
        Schema::create('events', function (Blueprint $table) {
            $table->integer('id', true);
            $table->tinyText('name');
            $table->dateTime('date')->nullable();
            $table->tinyText('locality')->nullable();
            $table->tinyText('place')->nullable();
            $table->integer('max_tables');
            $table->integer('organizer')->index('organizer');
            $table->tinyText('banner')->nullable();
            $table->text('description')->nullable();
            $table->integer('active')->default(0);
            $table->integer('request_time')->default(3)->comment('Period of time in wich a request can be deleted.');
            $table->integer('price')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
