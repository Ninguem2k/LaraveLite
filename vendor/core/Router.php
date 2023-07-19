<?php

namespace Vendor\Core;


class Router
{
    protected $routes = [];

    public function get($uri, $handler)
    {
        $this->addRoute('GET', $uri, $handler);
    }

    public function post($uri, $handler)
    {
        $this->addRoute('POST', $uri, $handler);
    }

    public function delete($uri, $handler)
    {
        $this->addRoute('DELETE', $uri, $handler);
    }

    public function put($uri, $handler)
    {
        $this->addRoute('PUT', $uri, $handler);
    }

    public function addRoute($method, $uri, $handler)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'handler' => $handler,
        ];
    }

    public function handleRequest()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                $handler = $route['handler'];

                if (is_callable($handler)) {
                    $handler();
                } elseif (is_array($handler)) {
                    $controllerClass = $handler[0];
                    $method = $handler[1];

                    $controllerObj = new $controllerClass();

                    if (method_exists($controllerObj, $method)) {
                        $controllerObj->$method();
                    } else {
                        $this->notFound();
                    }
                } else {
                    $this->notFound();
                }

                return;
            }
        }

        $this->notFound();
    }

    protected function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        echo '404 - Página não encontrada!';
        exit;
    }
}
