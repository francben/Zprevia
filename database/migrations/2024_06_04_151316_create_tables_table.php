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
        Schema::create('tables', function (Blueprint $table) {
            $table->integer('id', true);
            $table->tinyText('name');
            $table->integer('turn')->index('turn');
            $table->integer('request')->index('request');
            $table->integer('delegateA')->nullable()->index('representantea_idx');
            $table->integer('delegateB')->nullable()->index('representanteb_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
