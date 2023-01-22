<?php namespace Invitaciones\Landing\Components;

use Cms\Classes\ComponentBase;
use Invitaciones\Landing\Models\SeccionCuatro as SeccionCuatroModel;

class SeccionCuatro extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SeccionCuatro Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function dataSeccion()
    {
        $seccioncuatro = SeccionCuatroModel::first();
        return $seccioncuatro;
    }
}
