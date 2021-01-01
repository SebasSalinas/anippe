<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';

    protected $namespace = 'App\\Http\\Controllers';

    protected $baseNamespace = 'App\\Http\\Controllers\\Base';

    protected $portalNamespace = 'App\\Http\\Controllers\\Portal';

    protected $adminNamespace = 'App\\Http\\Controllers\\Admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', 'subDomain'])
                ->namespace($this->baseNamespace)
                ->domain('{subdomain}.anippe.test')
                ->as('base.')
                ->group(base_path('routes/base.php'));

            Route::middleware(['web', 'subDomain'])
                ->namespace($this->portalNamespace)
                ->domain('{subdomain}.anippe.test')
                ->as('portal.')
                ->prefix('portal')
                ->group(base_path('routes/portal.php'));

            Route::middleware(['web'])
                ->namespace($this->adminNamespace)
                ->as('admin.')
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
