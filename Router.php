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
            echo "Página no encontrada";
        }
    }

    public function render($view, $data = []) {

        foreach($data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";

        $content = ob_get_clean();

        include_once __DIR__ . "/views/layout.php";
    }
}