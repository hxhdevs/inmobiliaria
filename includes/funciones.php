<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONAES_URL', __DIR__. '/funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate(string $nombre,bool $inicio = false){
    include  TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado() {
    session_start();

    if (!$_SESSION['login']) {
        header('Location: ../login.php');
    }
}

function dep($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}


function s($html) : string{
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo){
   $tipos = ['vendedor','propiedad'];
   
   return in_array($tipo,$tipos);
}

function mostrarNotificaciones($codigo){
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}