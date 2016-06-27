# larapstart
## Main packages:
Admin templates by https://github.com/acacha/adminlte-laravel
Llum https://github.com/acacha/llum
Helpers by https://github.com/barryvdh/laravel-ide-helper
Scaffolding by http://packalyst.com/packages/package/infyomlabs/laravel-generator
RBAC by https://github.com/Zizaco/entrust
gravatar https://github.com/creativeorange/gravatar
Breadcrumbs by http://laravel-breadcrumbs.davejamesmiller.com/en/latest/start.html

## How to generate new model from database:
php artisan infyom:scaffold User --fromTable --tableName=users --save --prefix=admin

## How to add new provider and alias:
llum provider 'DaveJamesMiller\Breadcrumbs\ServiceProvider::class'
llum alias Breadcrumbs 'DaveJamesMiller\Breadcrumbs\Facade::class'

## assets:
bower -S i font-awesome
gulp
