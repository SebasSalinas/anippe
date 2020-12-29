<?php

namespace App\Http\Middleware;

use App\Models\Organisation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SubDomain
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $subDomain = request()->route('subdomain');

        $organisation = Organisation::select(['id', 'active'])->whereSubdomain($subDomain)->first();

        //If organisation does not exist, abort.
        if ($subDomain == null || $organisation == null) {
            abort(404);
        }

        //Is organisation active, abort
        if (!$organisation->active) {
            abort(404);
        }

        session()->put('subdomain', $subDomain);

        URL::defaults(['subdomain' => $subDomain]);

        $request->route()->forgetParameter('subdomain');

        return $next($request);
    }
}
