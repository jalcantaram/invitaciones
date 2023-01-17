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
        return []; // Remove this line to activate

        return [
            'Invitaciones\Landing\Components\MyComponent' => 'myComponent',
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
                'label'       => 'landing',
                'url'         => Backend::url('invitaciones/landing/custom'),
                'icon'        => 'icon-leaf',
                'permissions' => ['invitaciones.landing.*'],
                'order'       => 500,
            ],
        ];
    }
}
