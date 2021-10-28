<?php

return [
    'api' => [
        'url' => env('CAMUNDA_API_URL', 'http://localhost:8080/engine-rest'),
        'tenant-id' => env('CAMUNDA_API_TENANT_ID'),
        'auth' => [
            'user' => env('CAMUNDA_API_USER'),
            'password' => env('CAMUNDA_API_PASSWORD'),
        ],
    ],
    'logging' => env('CAMUNDA_LOGGING', false),
    'logging-channel' => env('CAMUNDA_LOGGING_CHANNEL', 'camunda'),
];
