<?php

namespace Webfactor\Laravel\Backpack\Documents;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class DocumentsServiceProvider extends ServiceProvider
{

    /**
     * Where the route file lives, both inside the package and in the app (if overwritten).
     *
     * @var string
     */
    public $routeFilePath = '/../routes/webfactor/documents.php';

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // define the routes for the application
        $this->setupRoutes($this->app->router);

        $this->loadTranslationsFrom(realpath(__DIR__.'/../resources/lang'), 'webfactor');

        $this->mergeConfigFrom(
            __DIR__.'/../config/webfactor/documents.php', 'webfactor.documents'
        );

        $this->publishFiles();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function publishFiles()
    {
        // publish config file
        $this->publishes([__DIR__.'/../config' => config_path()], 'config');

        // publish lang files
        $this->publishes([__DIR__.'/../resources/lang' => resource_path('lang/vendor/webfactor')], 'lang');

        // publish migrations
        $this->publishes([__DIR__.'/../database/migrations' => database_path('migrations')], 'migrations');

        // publish seeder
        $this->publishes([__DIR__.'/../database/seeds' => database_path('seeds')], 'seeder');

        // publish factory
        $this->publishes([__DIR__.'/../database/factories' => database_path('factories')], 'factories');
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        // by default, use the routes file provided in vendor
        $routeFilePathInUse = __DIR__.$this->routeFilePath;

        // but if there's a file with the same name in routes/webfactor, use that one
        if (file_exists(base_path().$this->routeFilePath)) {
            $routeFilePathInUse = base_path().$this->routeFilePath;
        }

        $this->loadRoutesFrom($routeFilePathInUse);
    }
}
