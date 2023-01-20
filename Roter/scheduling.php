<?php

require_once "./Config/Config.php";
require_once "./Controller/Auth/SchedulingController.php";
require_once "./View/SchedulingView.php";

$controller = new SchedulingController();


	$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
	$url = array_filter(explode('/', $url));
	var_dump($url);

	$file = $url[0] . '.php';

	if (is_file($file)) {
		include $file;
	} else {
		include '404.php';
	}
if () {
    $controller->agendar();
}
