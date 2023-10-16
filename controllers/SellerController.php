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

    public static function update(Router $router) {

        $errors = Seller::getErrors();
        $id = validateOrRedirect('/admin');

        // Get sellers data to update
        $seller = Seller::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Assing values
            $args = $_POST['seller'];
    
            // Sinchronize memory object
            $seller->synchronize($args);
    
            // Validation
            $errors = $seller->validate();
    
            if(empty($errors)) {
                $seller->save();
            }
        }
        
        $router->render('sellers/update', [
            'errors' => $errors,
            'seller' => $seller
        ]);
    }

    public static function delete() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // id validation
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if($id) {
                // type validation
                $type = $_POST['type'];

                if(validateTypeContent($type)) {
                    $seller = Seller::find($id);
                    $seller->delete();
                }
            }
        }
    }
}