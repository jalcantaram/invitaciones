<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddSeccionCuatrosTable extends Migration
{
    public function up()
    {
        Schema::table('invitaciones_landing_seccion_cuatros', function ($table) {
            $table->string('nombre_completo')->nullable();
            $table->string('email')->nullable();
            $table->string('celular')->nullable();
            $table->string('preferencia_comida')->nullable();
            $table->string('asistencia')->nullable();
            $table->text('mensaje')->nullable();
            $table->string('token')->nullable();
            $table->string('respuestas')->nullable();
            $table->string('active')->nullable();
        });
    }

    public function down()
    {
    }
}