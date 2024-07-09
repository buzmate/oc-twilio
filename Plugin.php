<?php namespace Webmors\SmsSender;

use System\Classes\PluginBase;
use App;
use Config;
use Illuminate\Foundation\AliasLoader;
/**
 * SmsSender Plugin Information File
 */
class Plugin extends PluginBase
{
    public function bootPackages()
    {
        // Get the namespace of the current plugin to use in accessing the Config of the plugin
        $pluginNamespace = str_replace('\\', '.', strtolower(__NAMESPACE__));
        
        // Instantiate the AliasLoader for any aliases that will be loaded
        $aliasLoader = AliasLoader::getInstance();
        
        // Get the packages to boot
        $packages = Config::get($pluginNamespace . '::packages');
        
        // Boot each package
        foreach ($packages as $name => $options) {
            // Setup the configuration for the package, pulling from this plugin's config
            if (!empty($options['config']) && !empty($options['config_namespace'])) {
                Config::set($options['config_namespace'], $options['config']);
            }
            
            // Register any Service Providers for the package
            if (!empty($options['providers'])) {
                foreach ($options['providers'] as $provider) {
                    App::register($provider);
                }
            }
            
            // Register any Aliases for the package
            if (!empty($options['aliases'])) {
                foreach ($options['aliases'] as $alias => $path) {
                    $aliasLoader->alias($alias, $path);
                }
            }
        }
    }
    
    public function pluginDetails()
    {
        return [
            'name'        => 'SmsSender',
            'description' => 'Send SMS to your users, through various providers.',
            'author'      => 'Webmors',
            'icon'        => 'icon-envelope-square'
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'Webmors\SmsSender\ReportWidgets\MessagesOverview'=>[
                'label'=>'SmsSender messages overview',
                'context'=>'dashboard'
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'smssender' => [
                'label' => 'SMS Sender',
                'icon' => 'icon-envelope-square',
                'description' => 'Send SMS to your users, through various providers.',
                'class' => 'Webmors\SmsSender\Models\Setting',
                'order' => 100
            ]
        ];
    }
}

