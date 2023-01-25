<?php

require_once "Class\View.php";

class kernel
{
    public function view($route, $data)
    {
        $view = new View($route);
        $view->with($data)->render();
    }
}
