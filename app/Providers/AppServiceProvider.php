<?php

namespace App\Providers;

use App\Models\Sanctum\PersonalAccessToken;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

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
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            $totalCartItems = auth()->check()
                ? auth()->user()->cart->items->sum('quantity')
                : 0;
    
            $view->with('totalCartItems', $totalCartItems);
        });
    }
}
