<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware stack (runs on EVERY request).
     */
    protected $middleware = [
        // Trust proxies / load balancers
        \App\Http\Middleware\TrustProxies::class,

        // Handles CORS preflight, etc.
        \Illuminate\Http\Middleware\HandleCors::class,

        // Prevent maintenance mode access
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // Validate POST size limits
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        // Trim strings from input
        \App\Http\Middleware\TrimStrings::class,

        // Convert empty strings to null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * Route middleware groups (applied via Route::middleware('web') / ('api')).
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,

            // If you use auth scaffolding that needs errors/old input:
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,

            // CSRF for POST/PUT/DELETE requests
            \App\Http\Middleware\VerifyCsrfToken::class,

            // Route bindings (implicit/explicit)
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Throttle API requests
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
}
