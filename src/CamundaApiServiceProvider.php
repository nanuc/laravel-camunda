<?php

namespace Nanuc\Camunda;

use Illuminate\Support\ServiceProvider;

class CamundaApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/camunda.php' => config_path('camunda.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}