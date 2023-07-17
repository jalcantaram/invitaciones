<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddNewFieldsDosSeccionCuatrosTable extends Migration
{
    public function up()
    {
        Schema::table('invitaciones_landing_seccion_cuatros', function ($table) {
            $table->string('numero_invitados')->nullable();
        });
    }

    public function down()
    {
    }
}