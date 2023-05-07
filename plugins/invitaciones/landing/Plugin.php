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
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        // return []; // Remove this line to activate

        return [
            'invitaciones.landing.send' => [
                'tab' => 'landing',
                'label' => 'Permiso para enviar y configurar invitaciones'
            ],
            'invitaciones.landing.catalogos' => [
                'tab' => 'catalogos',
                'label' => 'Permiso para configurar catalogos'
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
                    'seccion_dos' => [
                        'label' => 'Sección de configuración (Hoteles recomendados)',
                        'icon' => 'icon-upload',
                        'url' => Backend::url('invitaciones/landing/secciondos'),
                        'permissions' => ['invitaciones.landing.*'],
                    ],
                    'estatus' => [
                        'label' => 'Catalogo de ESTATUS',
                        'icon' => 'icon-upload',
                        'url' => Backend::url('invitaciones/landing/estatus'),
                        'permissions' => ['invitaciones.landing.catalogos.estatus.*'],
                    ],
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
            'getasistencia' => function ($ia){
                if(isset($ia)){
                    $c = new SeccionCuatro;
                    $a = $c->listAsistencia('', '', '');
                    return $a[$ia];
                }
            },
            'getmesa' => function ($i){
                if(isset($i)){
                    $c = new SeccionCuatro;
                    $l = $c->listMesa('', '', '');
                    return $l[$i];
                }
            },
            'getestatus' => function ($it){
                if(isset($it)){
                    $c = new SeccionCuatro;
                    $l = $c->listEstatus('', '', '');
                    return $l[$it];
                }
            },
            'getactive' => function ($ac){
                if(isset($ac) && $ac){
                    return 'Si';
                } else {
                    return 'No';
                }
            }
        ];
    }
}
