<?php namespace Invitaciones\Landing\Components;

use Cms\Classes\ComponentBase;
use Invitaciones\Landing\Models\SeccionOcho as SeccionOchoModel;

class SeccionOcho extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SeccionOcho Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function dataSeccion()
    {
        $seccionocho = SeccionOchoModel::first();
        return $seccionocho;
    }
}
