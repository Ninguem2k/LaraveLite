<?php

require_once "./Model/UserModel.php";

class AuthController
{

    private $model;
    private $viewLogin;
    private $viewRegister;

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
                $result;
                $pagina = "View\Login.php";
                return include('View\layouts\defalt.php');
            } else {
                header("location: dashboard.php");
            }
        } else {
            $pagina = "logar.php";
            return include('View\layouts\defalt.php');
        }
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];
            $result = $this->model->registrar($username, $password, $confirm_password);
            if (isset($result['username_err']) || isset($result['password_err']) || isset($result['confirm_password_err'])) {
                $this->viewRegister->displayRegistro($result);
            } else {
                header("location: login.php");
            }
        } else {
            $this->viewRegister->displayRegistro();
        }
    }
}
