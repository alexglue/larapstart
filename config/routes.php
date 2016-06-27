<?php

    return [
        'defaults' =>
        [
            'namespace'  => 'App\Http\Controllers',
            'filename'   => 'routes.php',
            'middleware' => 'web',
        ],
        'groups' =>
        [
            'main' =>
            [
                'namespace'  => 'App\Http\Controllers',
                'filename'   => 'routes.php',
                'middleware' => 'web',
            ],
            'site' =>
            [
                'namespace'  => 'App\Http\Controllers\Site',
                'filename'   => 'routes.site.php',
                'middleware' => 'web',
            ],
            'api' =>
            [
                'namespace'  => 'App\Http\Controllers\API',
                'filename'   => 'routes.api.php',
                'middleware' => 'api',
                'prefix'     => 'api/v1'
            ],
            'admin' =>
            [
                'namespace'  => 'App\Http\Controllers\Admin',
                'filename'   => 'routes.admin.php',
                'middleware' => ['web', 'admin'],
                'prefix'     => 'admin'
            ]
        ]
    ];