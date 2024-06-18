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
        Schema::create('entrevista', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->index('envento_idx');
            $table->integer('company_id')->index('empresa_idx');
            $table->integer('representante_id')->nullable()->index('representante_idx');
            $table->integer('company_solicitante_id')->nullable()->index('company_solicitante_idx');
            $table->integer('solicitante_id')->nullable()->index('solicitante_idx');
            $table->integer('turno_id')->nullable()->index('turno_idx');
            $table->string('mesa')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
        });

        Schema::table('entrevista', function (Blueprint $table) {
            $table->foreign(['event_id'], 'event_id_ibfk_1')->references(['id'])->on('events')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_id'], 'company_ibfk_2')->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['representante_id'], 'delegates_ibfk_3')->references(['id'])->on('delegates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['company_solicitante_id'], 'company_ibfk_6')->references(['id'])->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['solicitante_id'], 'delegates_ibfk_4')->references(['id'])->on('delegates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['turno_id'], 'turnos_ibfk_5')->references(['id'])->on('turns')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrevista');
    }
    
};
