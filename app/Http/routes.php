<?php

    /*
     * Same configuration as Laravel 5.2:
     * See https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/routes.stub
     */
    Route::group(['middleware' => 'web'], function () {
        //Route::auth();

        Route::group(['name' => 'bo', 'middleware' => 'auth'], function()
        {
            Route::get('/home', 'HomeController@index');
            Route::group(['name' => 'scaffolding'], function()
            {
                Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');
                Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
                Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');
            });
        });

        Route::group(['name' => 'site', 'middleware' => 'auth'], function()
        {
            Route::get('/', function () {
                return view('welcome');
            });

            Route::group(['name' => 'auth'], function()
            {
                Route::get('login', 'Auth\AuthController@getLogin');
                Route::post('login', 'Auth\AuthController@postLogin');
                Route::get('logout', 'Auth\AuthController@logout');

                // Registration Routes...
                Route::get('register', 'Auth\AuthController@getRegister');
                Route::post('register', 'Auth\AuthController@postRegister');

                // Password Reset Routes...
                Route::get('password/reset', 'Auth\PasswordController@getEmail');
                Route::post('password/email', 'Auth\PasswordController@postEmail');
                Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
                Route::post('password/reset', 'Auth\PasswordController@postReset');
            });
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