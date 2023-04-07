<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddNewFieldsTresSeccionCuatrosTable extends Migration
{
    public function up()
    {
        Schema::table('invitaciones_landing_seccion_cuatros', function ($table) {
            $table->string('estatus')->nullable();
            $table->string('send_email')->nullable();
            $table->string('send_whatsapp')->nullable();
            $table->dateTime('send_email_at')->nullable();
            $table->dateTime('send_whatsapp_at')->nullable();
        });
    }

    public function down()
    {
    }
}