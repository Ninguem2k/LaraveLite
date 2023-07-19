<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use Vendor\Core\App as AppCore;

require_once "./vendor/core/App.php";

$app = new AppCore();
$app->run();
