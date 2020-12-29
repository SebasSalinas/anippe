<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            switch ($guard) {
                case 'admin':
                    if (Auth::guard($guard)->check()) {
                        return redirect()->route('admin.dashboard');
                    }
                    break;
                case 'portal':
                    if (Auth::guard($guard)->check()) {
                        return redirect()->route('portal.dashboard');
                    }
                    break;
                case 'web':
                    if (Auth::guard($guard)->check()) {
                        if (!$request->routeIs('base.dashboard')) {
                            return redirect()->route('base.dashboard');
                        }
                    }
                    break;
                default:
                    if (Auth::guard($guard)->check()) {
                        if (!$request->routeIs('base.dashboard')) {
                            return redirect()->route('base.dashboard');
                        }
                    }
                    break;

            }
        }
        return $next($request);
    }
}
