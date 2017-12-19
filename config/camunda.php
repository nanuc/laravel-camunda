<?php

return [
    'api' => [
        'url' => env('CAMUNDA_API_URL', 'http://localhost:8080/engine-rest'),
        'tenant-id' => env('CAMUNDA_API_TENANT_ID'),
    ]
];
