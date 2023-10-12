<?php

namespace Controllers;
use MVC\Router;


class PropertyController {
    public static function index(Router $router) {
        $router->render('properties/admin');
    }

    public static function create() {
        echo "Crear propiedad";
    }

    public static function update() {
        echo "Actualizar propiedad";
    }
}