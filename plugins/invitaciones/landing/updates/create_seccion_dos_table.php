<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSeccionDosTable extends Migration
{
    public function up()
    {
        Schema::create('invitaciones_landing_seccion_dos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('frase')->nullable();
            $table->string('text_color');
            $table->string('background_color');
            $table->dropColumn('frase');
            $table->dropColumn('text_color');
            $table->dropColumn('background_color');
            $table->string('nombre_hotel')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('link_maps')->nullable();
            $table->string('url_hotel')->nullable();
            $table->string('codigo_reserva')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitaciones_landing_seccion_dos');
    }
}
