<?php

namespace App\Providers;

use App\Models\User;
use Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (app()->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        Gate::define('viewPulse', function (User $user) {
            return $user->email == 'xcz.ardiansyahputra2468@gmail.com' || $user->email == 'ardiansyah.putra@uts.ac.id';
        });
    }
}
