<?php namespace Invitaciones\Landing\Components;

use Cms\Classes\ComponentBase;
use Invitaciones\Landing\Models\SeccionTres as SeccionTresModel;

class SeccionTres extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SeccionTres Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function dataSeccion()
    {
        $secciontres = SeccionTresModel::first();
        return $secciontres;
    }
}
