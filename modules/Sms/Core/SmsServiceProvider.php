<?php

namespace Modules\Sms\Core ;

use Modules\Sms\Core\SmsManager;
use Illuminate\Support\ServiceProvider;
use Modules\Sms\ModuleProvider;

class SmsServiceProvider extends ModuleProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot(){
    	$this->publishes([
		    __DIR__.'/Config/sms.php'=>config_path('sms.php')
	    ]);
    }
    public function register()
    {
	    $this->mergeConfigFrom(
		    __DIR__.'/Config/sms.php', 'sms'
	    );
        $this->app->singleton('sms', function ($app) {
            return new SmsManager($app);
        });

    }
	/**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['sms'];
    }
}