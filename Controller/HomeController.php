<?php

require_once "Class\kernel.php";
class HomeController extends kernel
{
    public function index()
    {
        return $this->view('View\home.php', []);
    }
}
