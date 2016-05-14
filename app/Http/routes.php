<?php

    Route::group(['middleware' => 'web'], function () {

        Route::get('/', function () {
            return view('welcome');
        });

        Route::group([], function()
        {
            Route::get('login', 'Auth\AuthController@getLogin');
            Route::post('login', 'Auth\AuthController@postLogin');

            Route::get('logout', 'Auth\AuthController@logout');

            // Registration Routes...
            Route::get('register', 'Auth\AuthController@getRegister');
            Route::post('register', 'Auth\AuthController@postRegister');

            // Password Reset Routes...
            Route::post('password/email', 'Auth\PasswordController@postEmail');

            Route::get('password/reset', 'Auth\PasswordController@getEmail');
            Route::post('password/reset', 'Auth\PasswordController@postReset');

            Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
        });

        Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
        {
            Route::get('/', 'HomeController@index');
            Route::resource('users', 'UserController');
        });

        Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function()
        {

        });
    });

    /*
    |--------------------------------------------------------------------------
    | API routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
        Route::group(['prefix' => 'v1'], function () {
            require config('infyom.laravel_generator.path.api_routes');
        });
    });

