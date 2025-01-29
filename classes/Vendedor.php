<?php 

namespace App;

class Vendedor extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $columnasDB =['id','nombre','apellido','telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar(){
        if (!$this->nombre) {
            self::$errores[] = "El nombre del vendedor es obligatorio";
        }
        if (!$this->apellido) {
            self::$errores[] = "El apellido de la propiedad es obligatorio";
        }
        if (strlen($this->telefono)<2) {
            self::$errores[] = "El numero telefonico del vendedor es obligatorio";
        }
        
        if (!preg_match('/[0-9]{10}/', $this->telefono)) {
            self::$errores[] = "Formato telefonico invalido";
        }
        
        return self::$errores;
    }
}