<?php

namespace App\Providers;

use App\Models\SiteContent;
use Illuminate\Support\ServiceProvider;

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
        view()->composer(['home.index', 'about.index', 'contact.index'], function ($view) {
            $content = SiteContent::first();
            $view->with('content', $content);
        });
    }
}
