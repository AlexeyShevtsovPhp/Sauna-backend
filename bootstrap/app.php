<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Cors;
use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Providers\ArtisanServiceProvider;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Support\Facades\Facade;
use Illuminate\Http\Request;

Facade::setFacadeApplication(
    Application::configure(basePath: dirname(__DIR__))
        ->withRouting(
            web: __DIR__.'/../routes/web.php',
            api: __DIR__.'/../routes/api.php',
            commands: __DIR__.'/../routes/console.php',
            health: '/up',
        )
        ->withMiddleware(function ($middleware) {

            $middleware->prepend(HandleCors::class);

            $middleware->alias([
                'admin' => Admin::class,
                'user' => User::class,
                'cors' => Cors::class,
                'auth' => Authenticate::class,
                'sanctum' => EnsureFrontendRequestsAreStateful::class,
            ]);

            $middleware->remove(PreventRequestsDuringMaintenance::class);
        })
        ->withProviders([
            ArtisanServiceProvider::class,
            Illuminate\Foundation\Providers\FoundationServiceProvider::class,
            Illuminate\Cache\CacheServiceProvider::class,
            Illuminate\Filesystem\FilesystemServiceProvider::class,
            Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
            Illuminate\Foundation\Providers\ComposerServiceProvider::class,
            Illuminate\Database\DatabaseServiceProvider::class,
            Illuminate\Queue\QueueServiceProvider::class,
            Illuminate\View\ViewServiceProvider::class,
            Illuminate\Translation\TranslationServiceProvider::class,
            Illuminate\Pipeline\PipelineServiceProvider::class,
            Illuminate\Pagination\PaginationServiceProvider::class,
            Illuminate\Session\SessionServiceProvider::class,
            Illuminate\Validation\ValidationServiceProvider::class,
            Illuminate\Hashing\HashServiceProvider::class,
            Illuminate\Database\MigrationServiceProvider::class,
            Laravel\Sanctum\SanctumServiceProvider::class,
            Illuminate\Auth\AuthServiceProvider::class,
            Illuminate\Cookie\CookieServiceProvider::class,
        ])
        ->withExceptions(function (Exceptions $exceptions) {
            $exceptions->renderable(function (Throwable $exception, Request $request) {
                if ($exception instanceof ValidationException) {
                    return response()->json([
                        'message' => 'Ошибка валидации',
                        'errors' => $exception->errors(),
                    ], 422);
                }
                return null;
            });
        })
        ->create()
);

return Facade::getFacadeApplication();
