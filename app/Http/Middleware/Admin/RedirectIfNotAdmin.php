<?php

    namespace App\Http\Middleware\Admin;
    use Closure;
    use \Auth;
    use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

    /**
     * Class RedirectIfNotAdmin
     */
    class RedirectIfNotAdmin
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @param  string|null  $guard
         * @return mixed
         */
        public function handle($request, Closure $next, $guard = null)
        {
            if (Auth::guard($guard)->guest())
            {
                if ($request->ajax() || $request->wantsJson())
                {
                    return response('Unauthorized.', 401);
                }
                else
                {
                    return redirect()->guest('login');
                }
            }

            if(user()->cant('admin.access'))
            {
                throw new AccessDeniedHttpException('Unauthorized');
            }

            return $next($request);
        }
    }