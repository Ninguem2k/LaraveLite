<?php
require_once("./DynamicRouter.php");

$router = new DynamicRouter();
$router->add("home", "HomeController@index");
$router->add("logar", "AuthController@login");
$router->add("cadastrar", "AuthController@register");
$router->add("pedido/agendar", "SchedulingController@agendar");
$router->add("pedido/listar", "SchedulingController@listar");
$router->add("pedido/visualizar/([0-9]+)", "SchedulingController@visualizar");
$router->add("pedido/editar/([0-9]+)", "SchedulingController@editar");
$router->add("pedido/excluir/([0-9]+)", "SchedulingController@excluir");
$router->run();
