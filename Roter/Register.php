<?php

require_once "../Config/Config.php";
require_once "../Controller/Auth/registerController.php";
require_once "../View/RegisterView.php";

$controller = new RegisterController();
$controller->registrar();
