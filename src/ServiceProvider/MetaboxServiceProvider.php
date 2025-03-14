<?php

namespace Rayiumir\LaravelMetabox\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use Rayiumir\LaravelMetabox\Metabox;

class MetaboxServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('Metabox', function() {
            return new Metabox();
        });
    }
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->_loadMigrations();
    }

    private function _loadMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
    }
}
