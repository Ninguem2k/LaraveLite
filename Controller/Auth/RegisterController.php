<?php
require_once "../Model/UserModel.php";
require_once "../View/RegisterView.php";


class RegisterController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new RegisterView();
    }

    public function registrar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];
            $result = $this->model->registrar($username, $password, $confirm_password);
            if (isset($result['username_err']) || isset($result['password_err']) || isset($result['confirm_password_err'])) {
                $this->view->displayRegistro($result);
            } else {
                header("location: login.php");
            }
        } else {
            $this->view->displayRegistro();
        }
    }
}
