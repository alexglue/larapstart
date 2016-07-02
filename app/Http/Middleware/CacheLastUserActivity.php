<?php

namespace App\Http\Middleware;

use Auth;
use Cache;
use Carbon\Carbon;
use Closure;


/**
 * Class CacheLastUserActivity
 *
 * @package App\Http\Middleware
 */
class CacheLastUserActivity
{

    /**
     * @var string keyPrefix
     */
    private static $keyPrefix = 'user_is_online_';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $expiresAt = Carbon::now()->addMinutes(config('common.activity_limit', 5));
            Cache::put(self::cacheKey(user()->id), true, $expiresAt);
        }

        return $next($request);
    }


    /**
     * @param $userId
     *
     * @return string
     */
    private static function cacheKey($userId)
    {
        return self::$keyPrefix . $userId;
    }


    /**
     * @param $userId
     *
     * @return bool
     */
    public static function keyExists($userId)
    {
        return Cache::has(self::cacheKey($userId));
    }
}
