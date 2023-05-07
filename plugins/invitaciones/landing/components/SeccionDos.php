<?php namespace Invitaciones\Landing\Components;

use Cms\Classes\ComponentBase;
use Invitaciones\Landing\Models\SeccionDos as SeccionDosModel;

class SeccionDos extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SeccionDos Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function dataSeccion()
    {
        $secciondos = SeccionDosModel::all();
        return $secciondos;
    }
}
