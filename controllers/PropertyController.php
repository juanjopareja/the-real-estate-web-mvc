<?php

namespace Controllers;
use MVC\Router;
use Model\Property;
use Model\Seller;
use Intervention\Image\ImageManagerStatic as Image;


class PropertyController {
    public static function index(Router $router) {

        $properties = Property::all();

        $sellers = Seller::all();

        // Show conditional message
        $result = $_GET['result'] ?? null;

        $router->render('properties/admin', [
            'properties' => $properties,
            'result' => $result,
            'sellers' => $sellers
        ]);
    }

    public static function create(Router $router) {
        
        $property = new Property;
        $sellers = Seller::all();

        // Error Messages
        $errors = Property::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Create new instance **/ 
            $property = new Property($_POST['property']);
    
            /** Files Upload */ 
            // Generate Unique Name
            $imageName = md5( uniqid( rand(), ) ) . ".jpg";
    
            // Set image
            // Resize image Intervention
            if($_FILES['property']['tmp_name']['image']) {
                $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800,600);
                $property->setImage($imageName);
            }
    
            // Validation
            $errors = $property->validate();
    
            if(empty($errors)) { 
                // Create Folder
                if(!is_dir(IMAGES_FOLDER)) {
                    mkdir(IMAGES_FOLDER);
                }
    
                // Save image into server
                $image->save(IMAGES_FOLDER . $imageName);
    
                // Save into DB
                $property->save();
            }
    
        }
        
        $router->render('properties/create', [
            'property' => $property,
            'sellers' => $sellers,
            'errors' => $errors
        ]);
    }

    public static function update(Router $router) {
        $id = validateOrRedirect('/admin');
        $property = Property::find($id);
        $sellers = Seller::all();

        $errors = Property::getErrors();

        // Update Method POST
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        
            // Attribute asign
            $args = $_POST['property'];
            
            $property->synchronize($args);
            
            // Validation
            $errors = $property->validate();
           
            /** Files Upload */ 
            // Generate Unique Name
            $imageName = md5( uniqid( rand(), ) ) . ".jpg";
    
            if($_FILES['property']['tmp_name']['image']) {
                $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800,600);
                $property->setImage($imageName);
            }
    
            if(empty($errors)) {
                if($_FILES['property']['tmp_name']['image']) {
    
                // Save image
                $image->save(IMAGES_FOLDER . $imageName);
                }
            }
    
            $property->save();
        }

        $router->render('/properties/update', [
            'property' => $property,
            'errors' => $errors,
            'sellers' => $sellers
        ]);
    }

    public static function delete(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
    
                $type = $_POST['type'];
    
                if(validateTypeContent($type)) {
                    $property = Property::find($id);
                    $property->delete(); 
                }            
            }
        }
    }
}