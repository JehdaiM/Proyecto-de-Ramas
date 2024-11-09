<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Los middlewares globales de la aplicación.
     *
     * Estos middlewares se ejecutan durante **todas** las solicitudes.
     *
     * @var array<int,string>
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\LoadConfiguration::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\Foundation\Http\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];

    /**
     * Los middleware de ruta de la aplicación.
     *
     * Estos middlewares se asignan a grupos de rutas y se ejecutan solo para las rutas
     * que los usen específicamente.
     *
     * @var array<string, \Closure|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        
        // Tu middleware personalizado si lo tenías:
        // 'checkUserType' => \App\Http\Middleware\CheckUserType::class,   // Eliminar esta línea si no lo usas

        // Si tenías middlewares separados para administrador y usuario:
        // 'checkAdmin' => \App\Http\Middleware\CheckAdmin::class,     // Eliminar esta línea si no lo usas
        // 'checkUser' => \App\Http\Middleware\CheckUser::class,       // Eliminar esta línea si no lo usas
    ];

    /**
     * Los grupos de middleware de la aplicación.
     *
     * Estos grupos de middleware se asignan a las rutas cuando se llaman.
     *
     * @var array<string, array<int, \Closure|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
}
