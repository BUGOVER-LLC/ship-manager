<?php

declare(strict_types=1);

namespace Ship\Providers;

use Ship\Parents\Providers\RouteServiceProvider as ParentRouteServiceProvider;

class RouteServiceProvider extends ParentRouteServiceProvider
{
//    protected $namespace = '\Containers\Auth\UI\WEB\Controllers';

    /**
     * The name of the web "home" route for your application.
     *
     * This is used by Nucleus authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = 'web_welcome_say_welcome';

    /**
     * The name of the web "login" route for your application.
     *
     * This is used by Nucleus authentication to redirect users if unauthenticated.
     *
     * @var string
     */
    public const LOGIN = 'login';

    /**
     * The name of the web "unauthorized" route for your application.
     *
     * This is used by Nucleus authentication to redirect users if unauthorized.
     *
     * @var string
     */
    public const UNAUTHORIZED = 'unauthorized';
}
