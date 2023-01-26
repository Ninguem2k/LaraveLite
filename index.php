
<?php

require_once("./Roter/DynamicRouter.php");


$router = new DynamicRouter();
$router->add("", "HomeController@index");
$router->add("home", "HomeController@index");
$router->add("logar", "AuthController@login");
$router->add("agendar", "AgendaController@crete");
$router->add("cadastrar", "AuthController@register");
$router->add("pedido/agenda", "AgendaController@show");
$router->add("pedido/agendar", "AgendaController@store");
$router->add("user/agenda", "AgendaController@userShow");
$router->add("pedido/editar/([0-9]+)", "AgendaController@update");
$router->add("pedido/excluir/([0-9]+)", "AgendaController@destroy");
$router->add("pedido/visualizar/([0-9]+)", "AgendaController@index");
$router->run();
