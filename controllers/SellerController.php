<?php

namespace Controllers;
use MVC\Router;
use Model\Seller;

class SellerController {
    public static function create(Router $router) {
        
        $errors = Seller::getErrors();

        $seller = new Seller;

        $router->render('sellers/create', [
            'errors' => $errors,
            'seller' => $seller
        ]);
    }

    public static function update() {
        echo "Actualizar vendedor";
    }

    public static function delete() {
        echo "Eliminar vendedor";
    }
}