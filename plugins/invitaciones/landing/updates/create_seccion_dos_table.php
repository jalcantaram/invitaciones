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
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitaciones_landing_seccion_dos');
    }
}
