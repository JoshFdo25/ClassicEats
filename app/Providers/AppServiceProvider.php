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
            $totalCartItems = 0;
    
            if (auth()->check()) {
                $cart = auth()->user()->cart;
    
                // Check if cart exists
                if ($cart) {
                    $totalCartItems = $cart->items->sum('quantity');
                }
            }
    
            $view->with('totalCartItems', $totalCartItems);
        });
    }
}
