<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('turns', function (Blueprint $table) {
            $table->timestamps();
            $table->string('estado')->nullable();
            $table->integer('company_id')->index('empresa_idx');
        });

        Schema::table('turns', function (Blueprint $table) {
            $table->foreign(['company_id'], 'company_ibfk_2')->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turns', function (Blueprint $table) {
            $table->dropTimestamps();
            $table->dropColumn('estado');
        });
    }
};
