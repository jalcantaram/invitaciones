<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSeccionTresTable extends Migration
{
    public function up()
    {
        Schema::create('invitaciones_landing_seccion_tres', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo_ceremonia');
            $table->string('subtitulo_ceremonia');
            $table->string('donde_ceremonia');
            $table->string('cuando_ceremonia');
            $table->string('imagen_ceremonia');
            $table->string('titulo_recepcion');
            $table->string('subtitulo_recepcion');
            $table->string('donde_recepcion');
            $table->string('cuando_recepcion');
            $table->string('imagen_recepcion');
            $table->string('text_color');
            $table->string('background_color');
            $table->string('link_googlemaps_ceremonia');
            $table->string('link_googlemaps_recepcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitaciones_landing_seccion_tres');
    }
}
