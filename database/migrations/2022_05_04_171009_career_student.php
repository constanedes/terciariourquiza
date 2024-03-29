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
        Schema::create('career_student', function (Blueprint $table) {
            $table->foreignId('career_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->integer('year');
            $table->boolean('onOld')->default(false);
            $table->primary(['career_id', 'student_id', 'year'], 'careers_students');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_student');
    }
};
