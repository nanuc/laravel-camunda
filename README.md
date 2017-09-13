# Laravel API wrapper for Camunda

#### Edit your composer.json file
The original Camunda repository has outdated dependencies.
```shell
"repositories":
    [
        {
            "type": "vcs",
            "url": "https://github.com/wertmenschen/camunda-bpm-php-sdk"
        }
    ],
```

#### Require this package with composer

```shell
composer require wertmenschen/laravel-camunda
```


#### Optional: Publish the backup config file
```shell
php artisan vendor:publish --provider="Wertmenschen\CamundaApi\CamundaApiServiceProvider"
```

#### Set keys in .env
* CAMUNDA_API_URL
