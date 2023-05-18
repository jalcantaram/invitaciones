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
            $table->string('subtitulo_coctel')->nullable();
            $table->string('donde_coctel')->nullable();
            $table->string('hora_coctel')->nullable();
            $table->string('link_googlemaps_coctel')->nullable();
            $table->string('subtitulo_ceremonia')->nullable();
            $table->string('donde_ceremonia')->nullable();
            $table->string('hora_ceremonia')->nullable();
            $table->string('link_googlemaps_ceremonia')->nullable();
            $table->string('subtitulo_cena')->nullable();
            $table->string('donde_cena')->nullable();
            $table->string('hora_cena')->nullable();
            $table->string('link_googlemaps_cena')->nullable();
            $table->string('fecha_celebracion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitaciones_landing_seccion_tres');
    }
}
