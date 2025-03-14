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
        $this->_loadPublished();
    }

    private function _loadMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');
    }

    private function _loadPublished(): void
    {
        $this->publishes([
            __DIR__.'/../Traits' => app_path('Traits/')
        ],'LaravelMetaboxTrait');

        $this->publishes([
            __DIR__.'/../Models' => app_path('Models/')
        ],'LaravelMetaboxModel');

        $this->publishes([
            __DIR__.'/../Database/migrations' => database_path('migrations')
        ], 'LaravelMetaboxMigration');

        $this->publishes([
            __DIR__.'/../Database/factories' => database_path('factories')
        ], 'LaravelMetaboxFactory');
    }
}
