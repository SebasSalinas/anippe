<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'client' => Client::class,
            'user' => User::class,
            'client' => Contact::class,
            'project' => Project::class,
            'ticket' => Ticket::class,
            'ticket-reply' => TicketReply::class
        ]);


        \Spatie\Flash\Flash::levels([
            'success' => 'success',
            'warning' => 'warning',
            'error' => 'error',
        ]);
    }
}
