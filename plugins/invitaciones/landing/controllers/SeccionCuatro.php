<?php namespace Invitaciones\Landing\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

use Invitaciones\Landing\Models\SeccionCuatro as SeccionCuatroModel;

/**
 * Seccion Cuatro Back-end Controller
 */
class SeccionCuatro extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Invitaciones.Landing', 'landing', 'seccioncuatro');
    }

    public function onSendInvitacion(){
        $data = post();
        
        $_id = (int) $data['rowid'];
        
        $sc = SeccionCuatroModel::findOrFail($_id);

        \Log::info($sc);
        

    }
}
