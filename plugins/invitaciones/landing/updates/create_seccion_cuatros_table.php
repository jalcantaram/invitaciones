<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSeccionCuatrosTable extends Migration
{
    public function up()
    {
        Schema::create('invitaciones_landing_seccion_cuatros', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('numero_mesa')->nullable();
            $table->string('preferencia_bebidas')->nullable();
            $table->dateTime('send_at')->nullable();
            $table->dateTime('expiration_at')->nullable();
            $table->integer('estatus')->nullable();
            $table->string('send_email')->nullable();
            $table->string('send_whatsapp')->nullable();
            $table->dateTime('send_email_at')->nullable();
            $table->dateTime('send_whatsapp_at')->nullable();
            $table->string('nombre_completo')->nullable();
            $table->string('email')->nullable();
            $table->string('celular')->nullable();
            $table->string('preferencia_comida')->nullable();
            $table->string('asistencia')->nullable();
            $table->text('mensaje')->nullable();
            $table->string('token')->nullable();
            $table->string('respuestas')->nullable();
            $table->string('active')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitaciones_landing_seccion_cuatros');
    }
}
