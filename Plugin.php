<?php namespace Remusb\Bc;

/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */

use System\Classes\PluginBase;
use Event;
use Backend;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'BC',
            'description' => 'BC',
            'author'      => 'Remus Bunduc',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Remusb\Bc\Components\Deposit' => 'bcDeposit'
        ];
    }

    public function boot()
    {
        // Extend the navigation
        Event::listen('backend.menu.extendItems', function($manager) {
           $manager->addSideMenuItems('Remusb.Bc', 'mainmenuitem', [
                'deposit' => [
                    'label'       => 'Deposit',
                    'icon'        => 'icon-puzzle-piece',
                    'code'        => 'remusb-bc-deposit',
                    'owner'       => 'Remusb.Bc',
                    'url'         => Backend::url('deposit'),
                ],
            ]);
        });
    }
}
