<?php

$routes = [
    '' => 'View/home.php',
    'home' => 'View/home.php',
    'logar' => 'Roter\login.php',
    'cadastrar' => 'Roter\Register.php',
    'pedido/agendar' => 'Roter\Scheduling.php',
    'pedido/visualizar' => 'Roter\Scheduling.php',
    'pedido/editar' => 'Roter\Scheduling.php',
    'pedido/excluir' => 'Roter\Scheduling.php',
    'pedido/listar' => 'Roter\Scheduling.php',
];

$route = $_SERVER['REQUEST_URI'];

$route = ltrim($route, '/');

if (array_key_exists($route, $routes)) {
    require_once $routes[$route];
} else {
    echo 'Página não encontrada';
}
