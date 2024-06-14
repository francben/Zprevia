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
        Schema::create('companies', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('cif', 9)->unique('cif');
            $table->tinyText('name');
            $table->text('description')->nullable();
            $table->tinyText('sector')->nullable();
            $table->tinyText('address')->nullable();
            $table->tinyText('telephone')->nullable();
            $table->tinyText('locality')->nullable();
            $table->tinyText('province')->nullable();
            $table->tinyText('email')->nullable();
            $table->tinyText('rol_en_empresa')->nullable();
            $table->tinyText('profile')->nullable();
            $table->tinyText('dni')->nullable();
            $table->tinyText('logo')->nullable();
            $table->tinyText('video')->nullable();
            $table->unsignedBigInteger('admin')->index('admin');
            $table->text('cover')->nullable();
            $table->text('portafolio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
