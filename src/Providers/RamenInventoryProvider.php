<?php

namespace Ordent\RamenInventory\Providers;

use Illuminate\Support\ServiceProvider;

class RamenInventoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $rootPath = __DIR__.'/../';
        $this->app->register(\Ordent\RamenRest\Providers\RamenRestProvider::class);
        $this->mergeConfigFrom($rootPath.'config/rameninventory.php', 'ramen');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $rootPath = __DIR__.'/../';
        $this->loadMigrationsFrom($rootPath.'Migrations'); // load migrations
        $this->loadRoutesFrom($rootPath.'Routes/routes.php'); // load routes
        $this->publishes([
            $rootPath.'config/rameninventory.php' => config_path('rameninventory.php')
        ]);
    }
}
