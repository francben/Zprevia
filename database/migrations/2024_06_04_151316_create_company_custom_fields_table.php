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
        Schema::create('company_custom_fields', function (Blueprint $table) {
            $table->integer('custom_field');
            $table->integer('company')->index('company');
            $table->text('value');

            $table->primary(['custom_field', 'company']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_custom_fields');
    }
};