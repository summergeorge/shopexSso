<?php

namespace Shopex\Sso;

class ServiceProvider extends \Illuminate\Support\ServiceProvider{
        /**
     * Abstract type to bind Sentry as in the Service Container.
     *
     * @var string
     */
 

/**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {        
        $this->mergeConfigFrom(
            __DIR__.'/config.php', 'shopexsso'
        );
        $this->app->singleton('shopexsso',function(){
            return new ssoClient;
        });
    }

 /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('shopexsso.php'),
        ]);

    }

    

     /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['shopexsso',ssoClient::class];
    }
}