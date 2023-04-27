<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSeccionUnosTable extends Migration
{
    public function up()
    {
        Schema::create('invitaciones_landing_seccion_unos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->string('color_titulo')->nullable();
            $table->string('sub_titulo')->nullable();
            $table->string('color_sub_titulo')->nullable();
            $table->text('texto_complementario')->nullable();
            $table->string('color_texto_complementario')->nullable();
            $table->string('nombre_novio')->nullable();
            $table->string('color_nombre_novio')->nullable();
            $table->string('nombre_novia')->nullable();
            $table->string('color_nombre_novia')->nullable();
            $table->string('fecha')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitaciones_landing_seccion_unos');
    }
}
