<?php

namespace Fouladgar\EloquentBuilder;

use Fouladgar\EloquentBuilder\Support\Foundation\Concrete\FilterFactory;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/eloquent-builder.php' => config_path('eloquent-builder.php'),
        ], 'config');
    }

    /*
     * Register bindings in the container.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/eloquent-builder.php', 'eloquent-builder'
        );

        $this->app->bind('eloquentbuilder', function () {
            return new EloquentBuilder(new FilterFactory());
        });
    }
}
