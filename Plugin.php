<?php namespace Webmors\SmsSender;

use App;
use Backend;
use System\Classes\PluginBase;

/**
 * SmsSender Plugin Information File
 */
class Plugin extends PluginBase
{
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
