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