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
        Schema::create('carrera_estudiante_materia', function (Blueprint $table) {
            $table->foreignId('carrera_id')->constrained();
            $table->foreignId('materia_id')->constrained();
            $table->foreignId('estudiante_id')->constrained();
            $table->foreignId('comision_id')->constrained();
            $table->integer('nota');
            $table->primary(['carrera_id', 'materia_id', 'estudiante_id'],'carreras_estudiantes_materias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrera_estudiante_materia');
    }
};
