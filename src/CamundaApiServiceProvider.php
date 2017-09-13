<?php

namespace Wertmenschen\CamundaApi;

use Illuminate\Support\ServiceProvider;
use org\camunda\php\sdk\Api;

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
        $this->app->bind('camunda-api', function ($app) {
            $client = new Api(config('camunda.api.url'));
            return new CamundaApi($client);
        });
    }
}