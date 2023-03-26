<?php namespace Invitaciones\Landing;

use Backend;
use System\Classes\PluginBase;
use Invitaciones\Landing\Models\SeccionCuatro;


/**
 * landing Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'landing',
            'description' => 'No description provided yet...',
            'author'      => 'invitaciones',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Invitaciones\Landing\Components\SeccionUno' => 'seccionuno',
            'Invitaciones\Landing\Components\SeccionDos' => 'secciondos',
            'Invitaciones\Landing\Components\SeccionTres' => 'secciontres',
            'Invitaciones\Landing\Components\SeccionCuatro' => 'seccioncuatro',
            'Invitaciones\Landing\Components\SeccionCinco' => 'seccioncinco',
            // 'Invitaciones\Landing\Components\SeccionSeis' => 'seccionseis',
            // 'Invitaciones\Landing\Components\SeccionSiete' => 'seccionsiete',
            // 'Invitaciones\Landing\Components\SeccionOcho' => 'seccionocho',
            // 'Invitaciones\Landing\Components\SeccionNueve' => 'seccionnueve',


        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'invitaciones.landing.some_permission' => [
                'tab' => 'landing',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'landing' => [
                // 'label'       => 'landing',
                // 'url'         => Backend::url('invitaciones/landing/custom'),
                // 'icon'        => 'icon-leaf',
                // 'permissions' => ['invitaciones.landing.*'],
                // 'order'       => 500,
                // 'sideMenu' => [
                //     'seccion_uno' => [
                //         'label' => 'Primera sección (titulo)',
                //         'icon' => 'icon-upload',
                //         'url' => Backend::url('invitaciones/landing/seccion_uno'),
                //         'permissions' => ['invitaciones.landing.*'],
                //     ],
                // ],
                'label'       => 'landing',
                'url'         => Backend::url('invitaciones/landing/seccionuno'),
                'icon'        => 'icon-leaf',
                'permissions' => ['invitaciones.landing.*'],
                'order'       => 500,
                'sideMenu' => [
                    'seccion_uno' => [
                        'label' => 'Sección de configuración (titulos)',
                        'icon' => 'icon-upload',
                        'url' => Backend::url('invitaciones/landing/seccionuno'),
                        'permissions' => ['invitaciones.landing.*'],
                    ],
                    // 'seccion_dos' => [
                    //     'label' => 'Sección dos',
                    //     'icon' => 'icon-upload',
                    //     'url' => Backend::url('invitaciones/landing/secciondos'),
                    //     'permissions' => ['invitaciones.landing.*'],
                    // ],
                    'seccion_tres' => [
                        'label' => 'Sección de configuración (Donde y Cuando)',
                        'icon' => 'icon-upload',
                        'url' => Backend::url('invitaciones/landing/secciontres'),
                        'permissions' => ['invitaciones.landing.*'],
                    ],
                    'seccion_cuatro' => [
                        'label' => 'Sección de carga (Formulario de confirmación)',
                        'icon' => 'icon-upload',
                        'url' => Backend::url('invitaciones/landing/seccioncuatro'),
                        'permissions' => ['invitaciones.landing.*'],
                    ],
                    'seccion_cinco' => [
                        'label' => 'Sección de configuración (Fotos - Slider)',
                        'icon' => 'icon-picture-o',
                        'url' => Backend::url('invitaciones/landing/seccioncinco'),
                        'permissions' => ['invitaciones.landing.*'],
                    ],
                    // 'seccion_seis' => [
                    //     'label' => 'Sección seis',
                    //     'icon' => 'icon-upload',
                    //     'url' => Backend::url('invitaciones/landing/seccionseis'),
                    //     'permissions' => ['invitaciones.landing.*'],
                    // ],
                    // 'seccion_siete' => [
                    //     'label' => 'Sección siete',
                    //     'icon' => 'icon-upload',
                    //     'url' => Backend::url('invitaciones/landing/seccionsiete'),
                    //     'permissions' => ['invitaciones.landing.*'],
                    // ],
                    // 'seccion_ocho' => [
                    //     'label' => 'Sección ocho',
                    //     'icon' => 'icon-upload',
                    //     'url' => Backend::url('invitaciones/landing/seccionocho'),
                    //     'permissions' => ['invitaciones.landing.*'],
                    // ],
                    // 'seccion_nueve' => [
                    //     'label' => 'Sección nueve',
                    //     'icon' => 'icon-upload',
                    //     'url' => Backend::url('invitaciones/landing/seccionnueve'),
                    //     'permissions' => ['invitaciones.landing.*'],
                    // ],
                ],
            ],
        ];
    }

    public function registerListColumnTypes()
    {
        return [
            'img_carousel_thumb' => function ($src) {
                return "<img src=\"$src\" alt=\"\">";
            },
            'getmesa' => function ($i){
                $c = new SeccionCuatro;
                $l = $c->listMesa('', '', '');
                return $l[$i];
            },
            'getestatus' => function ($it){
                if(!isset($it)){
                    return 'Registrado';
                } else {
                    $c = new SeccionCuatro;
                    $l = $c->listEstatus('', '', '');
                    return $l[$it];
                }
            }
        ];
    }
}
