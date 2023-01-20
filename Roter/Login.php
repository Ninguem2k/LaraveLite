<?php

require_once "../Config/Config.php";
require_once "../Controller/Auth/LoginController.php";
require_once "../View/LoginView.php";

$controller = new LoginController();

$controller->login();
