<?php

namespace App\Providers;

use App\Repositories\Book\BookRepository;
use App\Repositories\Book\BookRepositoryImplement;
use App\Repositories\Sauna\SaunaRepository;
use App\Repositories\Sauna\SaunaRepositoryImplement;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImplement;
use Illuminate\Foundation\Providers\ArtisanServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(ArtisanServiceProvider::class);
        $this->app->bind(SaunaRepository::class, SaunaRepositoryImplement::class);
        $this->app->bind(BookRepository::class, BookRepositoryImplement::class);
        $this->app->bind(UserRepository::class, UserRepositoryImplement::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(base_path('routes/api.php'));
    }
}
