<?php

    Route::get('/home', function ()
    {
        return Redirect::to('/admin');
    });

    Route::get('/', function ()
    {
        return view('index');
    });

    Route::group(['namespace' => 'Auth'], function()
    {
        Route::get('login', 'AuthController@getLogin');
        Route::post('login', 'AuthController@postLogin');

        Route::get('logout', 'AuthController@logout');

        // Registration Routes...
        Route::get('register', 'AuthController@getRegister');
        Route::post('register', 'AuthController@postRegister');

        // Password Reset Routes...
        Route::post('password/email', 'PasswordController@postEmail');

        Route::get('password/reset', 'PasswordController@getEmail');
        Route::post('password/reset', 'PasswordController@postReset');

        Route::get('password/reset/{token}', 'PasswordController@getReset');
    });