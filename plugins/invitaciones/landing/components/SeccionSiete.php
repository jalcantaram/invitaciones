<?php namespace Invitaciones\Landing\Components;

use Cms\Classes\ComponentBase;
use Invitaciones\Landing\Models\SeccionSiete as SeccionSieteModel;

class SeccionSiete extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SeccionSiete Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function dataSession()
    {
        $seccionsiete = SeccionSieteModel::first();
        return $seccionsiete;
    }
}
