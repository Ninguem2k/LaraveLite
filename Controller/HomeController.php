<?php
class HomeController
{
    public function index()
    {
        $pagina = "View\home.php";
        return include('View\layouts\defalt.php');
    }
}
