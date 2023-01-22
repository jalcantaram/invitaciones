<?php namespace Invitaciones\Landing\Components;

use Cms\Classes\ComponentBase;
use Invitaciones\Landing\Models\SeccionCinco as SeccionCincoModel;

class SeccionCinco extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SeccionCinco Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function dataSeccion()
    {
        $seccioncinco = SeccionCincoModel::first();
        return $seccioncinco;
    }
}
