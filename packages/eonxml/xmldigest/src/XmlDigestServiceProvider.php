<?php

namespace Eonxml\Xmldigest;

use Illuminate\Support\ServiceProvider;

class XmlDigestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //load the Routes
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        //load the migrations
         $this->loadMigrationsFrom(__DIR__.'/migrations');
         
        //load views
        $this->loadViewsFrom(__DIR__.'/views', 'xml-digest');
           
        //publishing of views is optional
        $this->publishes([
                __DIR__.'/config/xml-digest.php' => config_path('xml-digest.php')
            ], 'config');
        
        //publishing of views is optional if someone wants to own the views
       /* $this->publishes([
               __DIR__.'/views' => resource_path('views/eonxml/xml-digest'),
                ], 'views');*/
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
