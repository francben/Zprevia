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
        Schema::create('delegates', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('dni', 9)->nullable()->unique('dni');
            $table->tinyText('name');
            $table->unsignedBigInteger('user')->index('usuario_idx');
            $table->integer('company')->index('empresa_idx');
            $table->integer('telephone')->nullable();
            $table->tinyText('position')->nullable();
            $table->text('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delegates');
    }
};
