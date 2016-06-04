<?php

    //Login Routes...
    Route::get('logout','Auth\AuthController@logout');

    // Registration Routes...
    //Route::get('register', 'Auth\AuthController@showRegistrationForm');
    //Route::post('register', 'Auth\AuthController@register');

    Route::get('/', 'DashboardController@index');

    Route::resource('users', 'UserController');

    Route::get('/me/edit', ['as' => 'admin.me.edit', 'uses' => 'UserController@me']);
    Route::post('/me/edit', ['as' => 'admin.me.edit.post', 'uses' => 'UserController@meEdit']);

    Route::post('/{id}/edit/password', ['as' => 'admin.users.update.password', 'uses' => 'UserController@updatePassword']);
