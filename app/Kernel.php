<?php

namespace App;

use Vendor\Core\View;

require_once "./vendor/core/View.php";

class kernel
{
    public function view($route, $data)
    {
        $view = new View($route);
        $view->with($data)->render();
    }

    public function authLogin()
    {
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            return $this->view('View\login.php', []);
        }
    }

    public function authAdmin()
    {
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] != "role_admin") {
            return $this->view('View\login.php', []);
        }
    }

    public function authAdminAuthor($id)
    {
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            if ($_SESSION["id"] == $id) {
                return $this->view('View\login.php', []);
            }
        }
    }
}
