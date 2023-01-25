<?php
require_once './Controller/AuthController.php';
require_once './Controller/HomeController.php';
require_once './Controller/SchedulingController.php';
require_once './Controller/AgendaController.php';

class DynamicRouter
{
    private $routes = [];

    public function add($route, $controller)
    {
        $this->routes[$route] = $controller;
    }

    public function run()
    {
        $route = $_SERVER['REQUEST_URI'];
        $route = ltrim($route, '/');

        foreach ($this->routes as $pattern => $controller) {
            if (preg_match("#^$pattern$#", $route, $matches)) {
                array_shift($matches);
                $controller = explode('@', $controller);
                $controller[0] = new $controller[0]();
                call_user_func_array(array($controller[0], $controller[1]), $matches);

                return;
            }
        }
        echo ("Pagina não encontrada");
    }
}
