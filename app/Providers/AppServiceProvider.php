<?php

namespace App\Providers;

use Illuminate\Foundation\Providers\ArtisanServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(ArtisanServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(base_path('routes/api.php'));
    }
}
