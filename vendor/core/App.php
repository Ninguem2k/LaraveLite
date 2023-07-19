<?php

namespace Vendor\Core;

use Routes\Routes;

require_once "routes\Web.php";
class App
{
    protected $routes;

    public function __construct()
    {
        $this->routes = new Routes();
    }

    public function run()
    {
        $this->routes->web();
    }
}
