<?php namespace Invitaciones\Landing\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSeccionSietesTable extends Migration
{
    public function up()
    {
        Schema::create('invitaciones_landing_seccion_sietes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre_papa_novio')->nullable();
            $table->string('nombre_mama_novio')->nullable();
            $table->string('nombre_papa_novia')->nullable();
            $table->string('nombre_mama_novia')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitaciones_landing_seccion_sietes');
    }
}
