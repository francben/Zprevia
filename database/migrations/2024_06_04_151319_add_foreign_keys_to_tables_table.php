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
        Schema::table('tables', function (Blueprint $table) {
            $table->foreign(['delegateA'], 'tables_ibfk_1')->references(['id'])->on('delegates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['delegateB'], 'tables_ibfk_2')->references(['id'])->on('delegates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['turn'], 'tables_ibfk_3')->references(['id'])->on('turns')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['request'], 'tables_ibfk_4')->references(['id'])->on('requests')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->dropForeign('tables_ibfk_1');
            $table->dropForeign('tables_ibfk_2');
            $table->dropForeign('tables_ibfk_3');
            $table->dropForeign('tables_ibfk_4');
        });
    }
};
