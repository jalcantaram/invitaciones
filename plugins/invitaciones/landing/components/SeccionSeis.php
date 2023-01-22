<?php namespace Invitaciones\Landing\Components;

use Cms\Classes\ComponentBase;
use Invitaciones\Landing\Models\SeccionSeis as SeccionSeisModel;

class SeccionSeis extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SeccionSeis Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function dataSesion()
    {
        $seccionseis = SeccionSeisModel::first();
        return $seccionseis;
    }
}
