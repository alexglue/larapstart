<?php

namespace App\Http;

use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\Authorize;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Zizaco\Entrust\Middleware\EntrustAbility;
use Zizaco\Entrust\Middleware\EntrustPermission;
use Zizaco\Entrust\Middleware\EntrustRole;

/**
 * Class Kernel
 *
 * @package App\Http
 */
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            Middleware\EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
            Middleware\VerifyCsrfToken::class,
            Middleware\CacheLastUserActivity::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'       => Middleware\Authenticate::class,
        'auth.basic' => AuthenticateWithBasicAuth::class,
        'can'        => Authorize::class,
        'guest'      => Middleware\RedirectIfAuthenticated::class,
        'throttle'   => ThrottleRequests::class,
        'role'       => EntrustRole::class,
        'permission' => EntrustPermission::class,
        'ability'    => EntrustAbility::class,
        'admin'      => Middleware\Admin\RedirectIfNotAdmin::class,
    ];
}
