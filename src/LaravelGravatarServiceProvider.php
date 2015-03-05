<?php
namespace FloatingPoint\Gravatar;

use Illuminate\Support\ServiceProvider;
use thomaswelton\GravatarLib\Gravatar as GravatarLib;

class LaravelGravatarServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('gravatar', function() {
            return new Gravatar(new GravatarLib);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['gravatar'];
    }
}
