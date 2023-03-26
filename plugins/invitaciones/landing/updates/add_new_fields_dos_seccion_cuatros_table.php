<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddNewFieldsDosSeccionCuatrosTable extends Migration
{
    public function up()
    {
        Schema::table('invitaciones_landing_seccion_cuatros', function ($table) {
            $table->string('numero_mesa')->nullable();
            $table->string('preferencia_bebidas')->nullable();
            $table->dateTime('send_at')->nullable();
            $table->dateTime('expiration_at')->nullable();
        });
    }

    public function down()
    {
    }
}