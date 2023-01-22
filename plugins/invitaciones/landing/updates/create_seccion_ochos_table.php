<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSeccionOchosTable extends Migration
{
    public function up()
    {
        Schema::create('invitaciones_landing_seccion_ochos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitaciones_landing_seccion_ochos');
    }
}
