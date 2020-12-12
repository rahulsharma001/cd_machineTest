<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\ProductRepoInterface',
            'App\Repository\Eloquent\ProductRepository'
        );
        $this->app->bind(
            'App\Repository\DProductRepoInterface',
            'App\Repository\Eloquent\DProductRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
