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
            $table->string('subtitulo_ceremonia')->nullable();
            $table->string('donde_ceremonia')->nullable();
            $table->string('cuando_ceremonia')->nullable();
            $table->string('hora_ceremonia')->nullable();
            $table->string('link_googlemaps_ceremonia')->nullable();
            $table->string('subtitulo_recepcion')->nullable();
            $table->string('donde_recepcion')->nullable();
            $table->string('cuando_recepcion')->nullable();
            $table->string('hora_recepcion')->nullable();
            $table->string('link_googlemaps_recepcion')->nullable();
            $table->string('text_color')->nullable();
            $table->string('background_color')->nullable();
            $table->string('fecha_celebracion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitaciones_landing_seccion_tres');
    }
}
