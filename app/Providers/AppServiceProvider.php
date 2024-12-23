<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        //Blade::componentNamespace('Resources\\Views\\Components\\Front\\Landing', 'landing');
        // if ($this->app->environment('production')) {
        //     URL::forceScheme('https');
        // };
    }
}
