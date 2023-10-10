<?php

namespace App;

class Seller extends ActiveRecord {

    protected static $table = 'sellers';

    protected static $columnsDB = ['id', 'name', 'lastname', 'phone'];

    public $id;
    public $name;
    public $lastname;
    public $phone;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->phone = $args['phone'] ?? '';
    }

    public function validate() {

        if(!$this->name) {
            self::$errors[] = "El nombre es obligatorio";
        }

        if(!$this->lastname) {
            self::$errors[] = "El apellido es obligatorio";
        }

        if(!$this->phone) {
            self::$errors[] = "El teléfono es obligatorio";
        }

        if(!preg_match('/[0-9]{10}/', $this->phone)) {
            self::$errors[] = "Formato no válido";
        }

        return self::$errors;
    }
}