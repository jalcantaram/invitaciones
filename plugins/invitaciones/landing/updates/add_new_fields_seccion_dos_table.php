<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddNewFieldsSeccionDosTable extends Migration
{
    public function up()
    {
        Schema::table('invitaciones_landing_seccion_dos', function ($table) {
            $table->dropColumn('frase');
            $table->dropColumn('text_color');
            $table->dropColumn('background_color');
            $table->string('nombre_hotel')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('link_maps')->nullable();
            $table->string('url_hotel')->nullable();
            $table->string('codigo_reserva')->nullable();
        });
    }

    public function down()
    {
    }
}