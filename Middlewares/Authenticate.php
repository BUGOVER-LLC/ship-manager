<?php

namespace Ship\Middlewares;

use Nucleus\Middlewares\Http\Authenticate as CoreMiddleware;
use Ship\Providers\RouteServiceProvider;

class Authenticate extends CoreMiddleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route(RouteServiceProvider::LOGIN);
        }
    }
}
