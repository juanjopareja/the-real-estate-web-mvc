<?php

namespace Controllers;

use MVC\Router;
use Model\Property;
use PHPMailer\PHPMailer\PHPMailer;

class PagesController {
    public static function index(Router $router) {

        $properties = Property::get(3);
        $start = true; 
        
        $router->render('pages/index', [
            'properties' => $properties,
            'start' => $start
        ]);
    }

    public static function about(Router $router) {
        
        $router->render('pages/about', []);
    }

    public static function properties(Router $router) {

        $properties = Property::all();

        $router->render('pages/properties', [
            'properties' => $properties
        ]);
    }

    public static function property(Router $router) {

        $id = validateOrRedirect('/properties');

        $property = Property::find($id);
        
        $router->render('pages/property', [
            'property' => $property
        ]);
    }

    public static function blog(Router $router) {
        $router->render('pages/blog');
    }
    
    public static function entry(Router $router) {   
        $router->render('pages/entry');
    }
    
    public static function contact(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $answers = $_POST['contact'];

            // Create PHPMailer instance
            $mail = new PHPMailer();

            // SMTP Config
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '3a94724a546351';
            $mail->Password = 'a17ac4346082ff';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Email content Config
            $mail->setFrom('admin@therealestate.com');
            $mail->addAddress('admin@therealestate.com', 'TheRealEstate.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // HTML enable
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Content define
            $content = '<html>';
            $content .= '<p>Tienes un nuevo mensaje</p>';
            $content .= '<p>Nombre: ' . $answers['name'] . ' </p>';
            $content .= '<p>E-mail: ' . $answers['email'] . ' </p>';
            $content .= '<p>Teléfono: ' . $answers['phone'] . ' </p>';
            $content .= '<p>Mensaje: ' . $answers['message'] . ' </p>';
            $content .= '<p>Vende o Compra: ' . $answers['type'] . ' </p>';
            $content .= '<p>Precio o Presupuesto: ' . $answers['price'] . ' €</p>';
            $content .= '<p>Contactado por: ' . $answers['contact'] . ' </p>';
            $content .= '<p>Fecha de contacto: ' . $answers['date'] . ' </p>';
            $content .= '<p>Hora de contacto: ' . $answers['hour'] . ' </p>';
            $content .= '</html>';

            $mail->Body = $content;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            // Email send
            if($mail->send()) {
                echo "Mensaje enviado correctamente";
            } else {
                echo "El mensaje no se pudo enviar...";
            }

        }

        $router->render('pages/contact', [

        ]);
        
    }
}