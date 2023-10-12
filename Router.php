<?php

namespace MVC;

class Router {

    public $routesGET = [];
    public $routesPOST = [];

    public function get($url, $function) {
        $this->routesGET[$url] = $function;
    }

    public function checkRoutes() {

        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET') {
            $function = $this->routesGET[$currentUrl] ?? null;
        }

        if($function) {
            call_user_func($function, $this);
        } else {
            // debug($_SERVER);
            echo "Página no encontrada";
        }
    }

    public function render($view) {
        include __DIR__ . "/views/$view.php";
    }
}