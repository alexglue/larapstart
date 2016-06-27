<?php

    use DaveJamesMiller\Breadcrumbs\Generator;

    Breadcrumbs::register(
        'admin.dashboard', function ( Generator $breadcrumbs ) {
        $breadcrumbs->push( 'Dashboard', route( 'admin.dashboard' ), [ 'icon' => 'fa-dashboard' ] );
    });

    Breadcrumbs::register(
        'admin.users.index', function ( Generator $breadcrumbs ) {
        $breadcrumbs->parent( 'admin.dashboard' );
        $breadcrumbs->push( trans( 'admin.models.user.actions.index' ), route( 'admin.users.index' ), [ 'icon' => 'fa-users' ] );
    });

    Breadcrumbs::register(
        'admin.users.create', function ( Generator $breadcrumbs ) {
        $breadcrumbs->parent( 'admin.users.index' );
        $breadcrumbs->push( trans( 'admin.base.actions.create' ), route( 'admin.users.create' ), [ 'icon' => 'fa-user' ] );
    });

    Breadcrumbs::register(
        'admin.users.show', function ( Generator $breadcrumbs, $userId ) {
        $breadcrumbs->parent( 'admin.users.index' );
        $breadcrumbs->push( trans( 'admin.base.actions.show' ), route( 'admin.users.show', $userId ), [ 'icon' => 'fa-eye' ] );
    });

    Breadcrumbs::register(
        'admin.users.edit', function ( Generator $breadcrumbs, $userId ) {
        $breadcrumbs->parent( 'admin.users.index' );
        $breadcrumbs->push( trans( 'admin.base.actions.edit' ), route( 'admin.users.edit', $userId ), [ 'icon' => 'fa-edit' ] );
    });

    Breadcrumbs::register(
        'admin.roles.index', function ( Generator $breadcrumbs ) {
        $breadcrumbs->parent( 'admin.dashboard' );
        $breadcrumbs->push( trans( 'admin.models.role.actions.index' ), route( 'admin.roles.index' ), [ 'icon' => 'fa-users' ] );
    });

    Breadcrumbs::register(
        'admin.roles.create', function ( Generator $breadcrumbs ) {
        $breadcrumbs->parent( 'admin.roles.index' );
        $breadcrumbs->push( trans( 'admin.base.actions.create' ), route( 'admin.roles.create' ), [ 'icon' => 'fa-user' ] );
    });

    Breadcrumbs::register(
        'admin.roles.permissions', function ( Generator $breadcrumbs, $roleId ) {
        $breadcrumbs->parent( 'admin.roles.index' );
        $breadcrumbs->push( trans( 'admin.models.permission.actions.list' ), route( 'admin.roles.permissions', $roleId ), [ 'icon' => 'fa-user' ] );
    });

    Breadcrumbs::register(
        'admin.permissions.index', function ( Generator $breadcrumbs ) {
        $breadcrumbs->parent( 'admin.dashboard' );
        $breadcrumbs->push( trans( 'admin.models.permission.actions.list' ), route( 'admin.permissions.index' ), [ 'icon' => 'fa-user' ] );
    });

    Breadcrumbs::register(
        'admin.permissions.create', function ( Generator $breadcrumbs ) {
        $breadcrumbs->parent( 'admin.permissions.index' );
        $breadcrumbs->push( trans( 'admin.models.permission.actions.create' ), route( 'admin.permissions.create' ), [ 'icon' => 'fa-user' ] );
    });

    Breadcrumbs::register(
        'admin.permissions.show', function ( Generator $breadcrumbs, $permissionId ) {
        $breadcrumbs->parent( 'admin.permissions.index' );
        $breadcrumbs->push( trans( 'admin.models.permission.actions.show' ), route( 'admin.permissions.show', $permissionId ), [ 'icon' => 'fa-user' ] );
    });

    Breadcrumbs::register(
        'admin.roles.show', function ( Generator $breadcrumbs, $roleId ) {
        $breadcrumbs->parent( 'admin.roles.index' );
        $breadcrumbs->push( trans( 'admin.models.roles.actions.show' ), route( 'admin.roles.show', $roleId ), [ 'icon' => 'fa-user' ] );
    });


    Breadcrumbs::register(
        'admin.permissions.edit', function ( Generator $breadcrumbs, $permissionId ) {
        $breadcrumbs->parent( 'admin.permissions.index' );
        $breadcrumbs->push( trans( 'admin.models.permission.actions.edit' ), route( 'admin.permissions.edit', $permissionId ), [ 'icon' => 'fa-user' ] );
    });