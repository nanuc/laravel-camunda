# Laravel API wrapper for Camunda

#### Edit your composer.json file
The original Camunda repository has outdated dependencies. Therefore we have to include it manually.
```shell
"repositories":
    [
        {
            "type": "vcs",
            "url": "https://github.com/wertmenschen/camunda-bpm-php-sdk"
        }
    ],
```

#### Require the packages with composer

```shell
composer require camunda/camunda-bpm-php-sdk:dev-master
```

```shell
composer require wertmenschen/laravel-camunda
```


#### Optional: Publish the backup config file
```shell
php artisan vendor:publish --provider="Wertmenschen\CamundaApi\CamundaApiServiceProvider"
```

#### Set keys in .env
* CAMUNDA_API_URL
