<?php
require_once "../Model/UserModel.php";
require_once "../View/LoginView.php";


class LoginController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new LoginView();
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $result = $this->model->login($username, $password);
            if (isset($result['username_err']) || isset($result['password_err'])) {
                $this->view->displayLogin($result);
            } else {
                header("location: dashboard.php");
            }
        } else {
            $this->view->displayLogin();
        }
    }
}
