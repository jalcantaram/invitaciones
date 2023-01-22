<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSeccionSeisTable extends Migration
{
    public function up()
    {
        Schema::create('invitaciones_landing_seccion_seis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
            $table->string('titulo_hospedaje');
            $table->string('descripcion_hospedaje');
            $table->string('imagen_hospedaje');
            $table->string('titulo_hoteles_recomendados');
            $table->string('descripcion_hoteles_recomendados');
            $table->string('imagen_hoteles_recomendados');
            $table->string('titulo_codigo_vestimenta');
            $table->string('descripcion_codigo_vestimenta');
            $table->string('imagen_codigo_vestimenta');
            $table->string('titulo_mesa_regalos')->nullable();
            $table->string('descripcion_mesa_regalos')->nullable();
            $table->string('imagen_mesa_regalos')->nullable();
            $table->string('titulo_luna_miel');
            $table->string('descripcion_luna_miel');
            $table->string('imagen_luna_miel');
            $table->string('background_color');
            $table->string('text_color');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitaciones_landing_seccion_seis');
    }
}
