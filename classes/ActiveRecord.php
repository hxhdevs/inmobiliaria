<?php

namespace App;

class ActiveRecord {

    protected static $db;
    protected static $columnasDB =[];
    protected static $tabla = '';

    protected static $errores =[];
    
    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){
        if(!is_null($this->id)){
            $this->actualizar();
        }else{
            $this->crear();
        }
    }

    public function crear(){
        $atributos = $this->sanitizarAtributos();
        
        $query = "INSERT INTO ".static::$tabla." ( ";
        $query.= join(', ', array_keys($atributos));
        $query.= " ) VALUES (' ";
        $query.= join("', '", array_values($atributos));
        $query.= "')";
        $resultado = self::$db->query($query);
        if ($resultado) {
            header('Location: /bienesraices/admin/propiedades/index.php?resultado=1');
        }
    }

    public function actualizar(){
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value){
            $valores[]="{$key}='{$value}'";
        }
        // dep($valores);
        $query = "UPDATE ".static::$tabla." SET "; 
        $query .=join(', ',$valores);
        $query .="WHERE id='".self::$db->escape_string($this->id)."'" ;
        $query .=" LIMIT 1;";
        // dep($query);
        $resultado = self::$db->query($query);
        if ($resultado) {
            header('Location: /bienesraices/admin/propiedades/index.php?resultado=2');
        }
    }

    public function eliminar(){
        $query = "DELETE FROM ".static::$tabla." WHERE id =".self::$db->escape_string($this->id)." LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header('location: ../../admin/propiedades/index.php?resultado=3');
        }
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

    public function borrarImagen(){
        dep('Eliminando imagen...');
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
        // if (!$this->vendedorId) {
        //     self::$errores[] = "Elige un vendedor";
        // }
        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }
        
        return self::$errores;
    }

    public function setImagen($imagen){
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public static function all(){
        $query = "SELECT * FROM ".static::$tabla;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function consultarSQL($query){
        $resultado = self::$db->query($query);

        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }

        $resultado->free();

        return $array;
    }

    public static function find($id){
        $query = "SELECT * FROM ".static::$tabla." WHERE id = ${id}";

        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function crearObjeto($registro){
        $objeto = new static;
        
        foreach ($registro as $key => $value) {
            if (property_exists($objeto,$key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if (property_exists($this, $key)&& !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

}