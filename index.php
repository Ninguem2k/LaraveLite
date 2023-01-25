
<?php

require_once("./Roter/DynamicRouter.php");


$router = new DynamicRouter();
$router->add("", "HomeController@index");
$router->add("home", "HomeController@index");
$router->add("logar", "AuthController@login");
$router->add("cadastrar", "AuthController@register");
$router->add("agendar", "AgendaController@view");
$router->add("pedido/listar", "SchedulingController@show");
$router->add("pedido/agendar", "SchedulingController@store");
$router->add("pedido/editar/([0-9]+)", "SchedulingController@update");
$router->add("pedido/excluir/([0-9]+)", "SchedulingController@destroy");
$router->add("pedido/visualizar/([0-9]+)", "SchedulingController@index");
$router->run();
