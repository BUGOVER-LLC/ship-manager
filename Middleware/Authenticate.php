<?php

declare(strict_types=1);

namespace Ship\Middleware;

use Nucleus\Middlewares\Http\Authenticate as CoreMiddleware;
use Ship\Provider\RouteServiceProvider;

class Authenticate extends CoreMiddleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route(RouteServiceProvider::LOGIN);
        }
    }
}
