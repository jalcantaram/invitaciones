<?php namespace Invitaciones\Landing\Components;

use Cms\Classes\ComponentBase;
use Invitaciones\Landing\Models\SeccionUno as SeccionUnoModel;

class SeccionUno extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SeccionUno Component',
            'description' => 'No description provided yet...'
        ];
    }

    // public function defineProperties()
    // {
    //     return [];
    // }
    public function dataSeccion()
    {
       $seccionuno = SeccionUnoModel::first();
       return $seccionuno;
    }
}
