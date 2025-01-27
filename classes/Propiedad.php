<?php

namespace App;

class Propiedad extends ActiveRecord {

    protected static $tabla = 'propiedades';
    protected static $columnasDB =['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedorId'];

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

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar(){
        if (!$this->titulo){
            self::$errores[] = "Debes añadir un titulo a la propiedad";
        }
        if (!$this->precio) {
            self::$errores[] = "El precio es obligatorio para la propiedad";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen para la propiedad es obligatoria";
        }
        if (strlen($this->descripcion)<2) {
            self::$errores[] = "La descripcion para la propiedad es obligatoria como minimo 10 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "El numero de habitaciones de la propiedad es obligatorio";
        }
        if (!$this->wc) {
            self::$errores[] = "El numero de baños de la propiedad es obligatorio";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "El numero de estacionamientos por propiedad es obligatorio";
        }
        if (!$this->vendedorId) {
            self::$errores[] = "Elige un vendedor de la propiedad";
        }
        
        return self::$errores;
    }
}