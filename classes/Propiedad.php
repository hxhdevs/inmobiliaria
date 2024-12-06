<?php

namespace App;

class Propiedad {

    protected static $db;
    protected static $columnasDB =['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','fk_vendedor'];

    protected static $errores =[];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;
    public $fk_vendedor;
    
    public static function setDB($database){
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        // $this->vendedorId = $args['vendedorId'] ?? '';
        $this->fk_vendedor = $args['vendedorId'] ?? '';
    }

    public function guardar(){
        $atributos = $this->sanitizarAtributos();
        
        $query = "INSERT INTO propiedades ( ";
        $query.= join(', ', array_keys($atributos));
        $query.= " ) VALUES (' ";
        $query.= join("', '", array_values($atributos));
        $query.= "')";
        dep($query);
        dep($this->atributos());
        $resultado = self::$db->query($query);
        dep($resultado);
    }

    public function atributos(){//Identifica y une los atributos de la BD
        $atributos = [];
        foreach(self::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] =  $this->$columna;
        }
        return $atributos;
    }
    
    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){
        if (!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }
        if (!$this->precio) {
            self::$errores[] = "El precio ees obligatorio";
        }
        if (strlen($this->descripcion)<2) {
            self::$errores[] = "La descripcion es obligatoria como minimo 10 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "El numero de habitaciones es obligatorio";
        }
        if (!$this->wc) {
            self::$errores[] = "El numero de baños es obligatorio";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "El numero de estacionamiento es obligatorio";
        }
        if (!$this->vendedorId) {
            self::$errores[] = "Elige vendedor";
        }
        // if (!$this->imagen['name'] || $imagen['error']) {
        //     $errores[] = "La imagen es obligatoria vendedor";
        // }
        
        // $medida = 1000 * 1000;
        
        // if ($this->imagen['size']>$medida) {
        //     $errores[]='La imagen es muy pesada';
        // }
        
        return self::$errores;
    }

}