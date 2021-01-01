<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->routeIs('portal.*')) {
            return route('portal.login', $request->subdomain);
        } elseif ($request->routeIs('base.*')) {
            return route('base.login', $request->subdomain);
        } elseif ($request->routeIs('admin.*')) {
            return route('admin.login', $request->subdomain);
        } else {
            return redirect()->to('/');
        }
    }
}
