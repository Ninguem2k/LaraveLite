<?php

namespace Routes;

use App\Controllers\NotFoundController;
use App\Controllers\HomeController;
use Vendor\Core\Router;

require_once "Vendor\Core\Router.php";

class Routes
{
    public function web()
    {
        $router = new Router();
        $router->get('/', [HomeController::class, 'index']);
        $router->get('/Home', [HomeController::class, 'index']);
        $router->get('/404', [NotFoundController::class, 'index']);
        $router->handleRequest();
    }
}
