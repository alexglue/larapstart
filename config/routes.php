<?php

    return [
        'defaults' =>
        [
            'namespace'  => 'App\Http\Controllers',
            'middleware' => 'web',
            'filename'   => 'routes.php'
        ],
        'groups' =>
        [
            'main' =>
            [
                'namespace'  => 'App\Http\Controllers',
                'middleware' => 'web',
                'filename'   => 'routes.php'
            ],
            'site' =>
            [
                'namespace'  => 'App\Http\Controllers\Site',
                'filename'   => 'routes.site.php',
                'middleware' => 'web'
            ],
            'api' =>
            [
                'namespace'  => 'App\Http\Controllers\API',
                'filename'   => 'routes.api.php',
                'middleware' => 'api',
                'prefix'     => 'api'
            ],
            'admin' =>
            [
                'namespace'  => 'App\Http\Controllers\Admin',
                'filename'   => 'routes.admin.php',
                'middleware' => 'web',
                'prefix'     => 'admin'
            ]
        ]
    ];