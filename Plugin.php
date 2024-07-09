<?php namespace Webmors\Twilio;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
    }

    public function register()
    {
        \App::registerClassAlias('TwilioClient', \Twilio\Rest\Client::class);
        /*
        \App::register(\SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class);
        \App::registerClassAlias('QrcodeManager', \Dondo\Qrcodes\Facades\QrcodeManager::class);
        \App::register(\Dondo\Qrcodes\Providers\QrcodeServiceProvider::class);
        */
    }
}
