<?php namespace Invitaciones\Landing;

use Backend;
use System\Classes\PluginBase;

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
                //         'label' => 'Primera secci??n (titulo)',
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
                        'label' => 'Primera secci??n (titulo)',
                        'icon' => 'icon-upload',
                        'url' => Backend::url('invitaciones/landing/seccionuno'),
                        'permissions' => ['invitaciones.landing.*'],
                    ],
                    'seccion_dos' => [
                        'label' => 'Secci??n dos',
                        'icon' => 'icon-upload',
                        'url' => Backend::url('invitaciones/landing/secciondos'),
                        'permissions' => ['invitaciones.landing.*'],
                    ],
                    'seccion_tres' => [
                        'label' => 'Secci??n tres (Donde y Cuando)',
                        'icon' => 'icon-upload',
                        'url' => Backend::url('invitaciones/landing/secciontres'),
                        'permissions' => ['invitaciones.landing.*'],
                    ],
                    'seccion_cuatro' => [
                        'label' => 'Secci??n cuatro (Formulario de confirmaci??n)',
                        'icon' => 'icon-upload',
                        'url' => Backend::url('invitaciones/landing/seccioncuatro'),
                        'permissions' => ['invitaciones.landing.*'],
                    ],
                    'seccion_cinco' => [
                        'label' => 'Secci??n cinco (Fotos - Slider)',
                        'icon' => 'icon-picture-o',
                        'url' => Backend::url('invitaciones/landing/seccioncinco'),
                        'permissions' => ['invitaciones.landing.*'],
                    ],
                    // 'seccion_seis' => [
                    //     'label' => 'Secci??n seis',
                    //     'icon' => 'icon-upload',
                    //     'url' => Backend::url('invitaciones/landing/seccionseis'),
                    //     'permissions' => ['invitaciones.landing.*'],
                    // ],
                    // 'seccion_siete' => [
                    //     'label' => 'Secci??n siete',
                    //     'icon' => 'icon-upload',
                    //     'url' => Backend::url('invitaciones/landing/seccionsiete'),
                    //     'permissions' => ['invitaciones.landing.*'],
                    // ],
                    // 'seccion_ocho' => [
                    //     'label' => 'Secci??n ocho',
                    //     'icon' => 'icon-upload',
                    //     'url' => Backend::url('invitaciones/landing/seccionocho'),
                    //     'permissions' => ['invitaciones.landing.*'],
                    // ],
                    // 'seccion_nueve' => [
                    //     'label' => 'Secci??n nueve',
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
        ];
    }
}
