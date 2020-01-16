<?php

namespace App\Http;

use App\Http\Middleware\CorsMiddleware;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Router;

class Kernel extends HttpKernel
{
    /**
     * @param Application $app
     * @param Router $router
     */
    public function __construct(Application $app, Router $router)
    {
        $this->middleware = [
            CorsMiddleware::class
        ];

        parent::__construct($app, $router);
    }
}
