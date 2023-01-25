<?php
session_start();

$_SESSION = array();

session_destroy();

$url = $_SERVER['HTTP_HOST'];
header("location: $url/logar");
exit;
