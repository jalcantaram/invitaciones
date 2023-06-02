<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddNewFieldsSeccionCuatrosTable extends Migration
{
    public function up()
    {
        Schema::table('invitaciones_landing_seccion_cuatros', function ($table) {
            $table->string('shortUrl')->nullable();
            $table->string('longUrl')->nullable();
            $table->text('response')->nullable();
        });
    }

    public function down()
    {
    }
}