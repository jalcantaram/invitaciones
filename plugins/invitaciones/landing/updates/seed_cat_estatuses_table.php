<?php namespace Arzola\OsPages\Updates;

use October\Rain\Database\Updates\Seeder;
use Invitaciones\Landing\Models\Catalogos\Estatus;

class Seed_Default_Blocks extends Seeder
{

    public function run()
    {
        Estatus::create([
            'code' => 'registrado',
            'descripcion' => 'Registrado',
            'active' => true
        ]);
        Estatus::create([
            'code' => 'enviado',
            'descripcion' => 'Enviado',
            'active' => true
        ]);
        Estatus::create([
            'code' => 'recibido',
            'descripcion' => 'Recibido',
            'active' => true
        ]);
        Estatus::create([
            'code' => 'leido',
            'descripcion' => 'Leido',
            'active' => true
        ]);
        Estatus::create([
            'code' => 'confirmado',
            'descripcion' => 'Confirmado',
            'active' => true
        ]);
        Estatus::create([
            'code' => 'expirado',
            'descripcion' => 'Expirado',
            'active' => true
        ]);
    }

}