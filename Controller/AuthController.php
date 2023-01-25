<?php

require_once "./Model/UserModel.php";
require_once "Class\View.php";

class AuthController
{

    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $result = $this->model->login($username, $password);
            if (isset($result['username_err']) || isset($result['password_err'])) {
                $errors = $result;
                return include('View\Login.php');
            } else {
                header("location: home");
            }
        } else {
            return include('View\Login.php');
        }
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $whatsapp = $_POST["whatsapp"];
            $confirm_password = $_POST["confirm_password"];
            $result = $this->model->registrar($username, $whatsapp, $password, $confirm_password);
            if (isset($result['username_err']) || isset($result['password_err']) || isset($result['confirm_password_err'])) {
                $errors = $result;
                return include('View\Register.php');
            } else {
                return include('View\Login.php');
            }
        } else {
            return include('View\Register.php');
        }
    }
}
