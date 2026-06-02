<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Ability;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       // SUPER ADMIN bypass
    Gate::before(function ($user, $ability) {
        if ($user && $user->role == 1) {
            return true;
        }
    });

    // define gates
    if (app()->runningInConsole()) {
        return;
    }

    Ability::all()->each(function ($ab) {

        Gate::define($ab->title, function ($user) use ($ab) {
            return $user->roleData
                ->abilities
                ->pluck('title')
                ->contains($ab->title);

        });
    });
    }
}
