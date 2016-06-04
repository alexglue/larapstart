<?php

    Route::get('/', function ()
    {
        return view('index');
    });

    Route::group(['prefix' => 'admin'], function()
    {
        Route::get('login','Admin\Auth\AuthController@showLoginForm');
        Route::post('login','Admin\Auth\AuthController@login');

        // Password Reset Routes...
        Route::post('password/email', 'Admin\Auth\PasswordController@postEmail');

        Route::get('password/reset', 'Admin\Auth\PasswordController@getEmail');
        Route::post('password/reset', 'Admin\Auth\PasswordController@postReset');

        Route::get('password/reset/{token}', 'Admin\Auth\PasswordController@getReset');
    });
