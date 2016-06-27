<?php

    Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);

    Route::resource('users', 'UserController');

    Route::get('me/edit', ['as' => 'admin.me.edit', 'uses' => 'UserController@me']);
    Route::post('me/edit', ['as' => 'admin.me.edit.post', 'uses' => 'UserController@meEdit']);

    Route::post('{id}/edit/password', ['as' => 'admin.users.update.password', 'uses' => 'UserController@updatePassword']);

    /** Roles Routes **/
    Route::resource('roles', 'RoleController');
    Route::group(['prefix' => 'roles'], function()
    {
        Route::get('permissions/get', [
            'as' => 'admin.roles.permissions.get-select',
            'uses' => 'PermissionController@getForSelect'
        ]);
        Route::get('permissions/{id}', ['as' => 'admin.roles.permissions', 'uses' => 'RoleController@permissions']);
        Route::get('{id}/permissions', ['as' => 'admin.roles.permissions', 'uses' => 'RoleController@permissions']);
        Route::get('{id}/permissions/{permission}/delete', [
            'as' => 'admin.roles.permissions.delete',
            'uses' => 'RoleController@permissionsDelete'
        ]);

        Route::post('permissions/assign/', [
            'as' => 'admin.roles.permissions.assign',
            'uses' => 'PermissionController@permissionsAssign'
        ]);
    });

    /** Permissions Routes **/
    Route::group(['prefix' => 'permissions'], function(){
        Route::get('/', ['as' => 'admin.permissions.index', 'uses' => 'PermissionController@index']);

        Route::get('create', ['as' => 'admin.permissions.create', 'uses' => 'PermissionController@create']);
        Route::post('create', ['as' => 'admin.permissions.store', 'uses' => 'PermissionController@store']);

        Route::get('{id}/show', ['as' => 'admin.permissions.show', 'uses' => 'PermissionController@show']);

        Route::get('{id}/edit', ['as' => 'admin.permissions.edit', 'uses' => 'PermissionController@edit']);
        Route::post('{id}/edit', ['as' => 'admin.permissions.update', 'uses' => 'PermissionController@update']);
        Route::get('{id}/delete', ['as' => 'admin.permissions.destroy', 'uses' => 'PermissionController@destroy']);
    });
