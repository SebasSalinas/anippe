<?php

namespace App\Providers;

use App\Http\Composers\Base\PinnedProjectsComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootBaseComposers();

        $this->bootPortalComposers();
    }

    private function bootBaseComposers()
    {
        view()->composer(['base.layouts.partials.sidebar'], PinnedProjectsComposer::class);
    }

    private function bootPortalComposers()
    {
    }
}
