<?php

$routes = [
    '' => 'View/home.php',
    'home' => 'View/home.php',
    'logar' => 'Roter\login.php',
    'cadastrar' => 'Roter\Register.php',
    'agendar' => 'Roter\Scheduling.php',
];

$route = $_SERVER['REQUEST_URI'];

$route = ltrim($route, '/');

if (array_key_exists($route, $routes)) {
    require_once $routes[$route];
} else {
    echo 'Página não encontrada';
}
