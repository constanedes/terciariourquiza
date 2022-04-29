<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('docpersonas');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email');
            $table->string('nacionalidad');
            $table->string('celular');
            $table->string('calle');
            $table->string('numero');
            $table->string('piso');
            $table->string('dpto');
            $table->string('codpostal');
            $table->foreignId('localidad_id')
                ->nullable()
                ->references('id')
                ->on('localidades')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
};