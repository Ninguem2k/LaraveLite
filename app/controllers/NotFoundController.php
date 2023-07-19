<?php

namespace App\Controllers;

use App\Kernel;


class NotFoundController extends kernel
{
    public function index()
    {
        return $this->view('app\views\404.php', []);
    }
}
