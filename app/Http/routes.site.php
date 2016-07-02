<?php

    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');

    Route::get('logout', 'Auth\AuthController@logout');
    Route::get('admin/logout', 'Auth\AuthController@logout');

    // Registration Routes...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

    // Password Reset Routes...
    Route::post('password/email', 'Auth\PasswordController@postEmail');

    Route::get('password/reset', 'Auth\PasswordController@getEmail');
    Route::post('password/reset', 'Auth\PasswordController@postReset');

    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');

