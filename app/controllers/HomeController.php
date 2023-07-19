<?php

namespace App\Controllers;

use App\Kernel;

use App\Models\HomeModel;


class HomeController extends kernel
{
    public function index()
    {
        $homeModel = new HomeModel();
        $data = $homeModel->getData();

        return $this->view('app\views\home.php', ["data" => $data]);
    }
}
