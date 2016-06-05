<?php

    use DaveJamesMiller\Breadcrumbs\Generator;

    Breadcrumbs::register('admin.dashboard', function(Generator $breadcrumbs)
    {
        $breadcrumbs->push('Dashboard', route('admin.dashboard'), ['icon' => 'fa-dashboard']);
    });

    Breadcrumbs::register('admin.users.index', function(Generator $breadcrumbs)
    {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(trans('admin.models.user.actions.index'), route('admin.users.index'), ['icon' => 'fa-users']);
    });

    Breadcrumbs::register('admin.users.create', function(Generator $breadcrumbs)
    {
        $breadcrumbs->parent('admin.users.index');
        $breadcrumbs->push(trans('admin.models.user.actions.create'), route('admin.users.create'), ['icon' => 'fa-user']);
    });