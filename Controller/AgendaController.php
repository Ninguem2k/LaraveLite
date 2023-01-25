<?php
require_once "Class\View.php";

class AgendaController
{
    public function view()
    {
        $view = new View('View\Agendar.php');
        $view->with('nome', 'João')->with('idade', 25)->render();
    }
}
