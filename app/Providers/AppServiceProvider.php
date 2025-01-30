<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Statistic;

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
           // Share $statistic with all views
           View::composer('*', function ($view) {
            $statistic = Statistic::first(); // Retrieve your statistics data
            $view->with('statistic', $statistic);
        });
    }
}
