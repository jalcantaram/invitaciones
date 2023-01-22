<?php namespace Invitaciones\Landing\Components;

use Cms\Classes\ComponentBase;
use Invitaciones\Landing\Models\SeccionNueve as SeccionNueveModel;

class SeccionNueve extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SeccionNueve Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function dataSeccion()
    {
        $seccionnueve = SeccionNueveModel::first();
        return $seccionnueve;
    }
}
