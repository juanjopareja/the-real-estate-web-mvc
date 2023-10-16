<?php

namespace Controllers;
use MVC\Router;
use Model\Seller;

class SellerController {
    public static function create(Router $router) {
        
        $errors = Seller::getErrors();

        $seller = new Seller;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            // Create new instance
            $seller = new Seller($_POST['seller']);
    
            // Validate empty fields
            $errors = $seller->validate();
    
            // No errors
            if(empty($errors)) {
                $seller->save();
            }
        }

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