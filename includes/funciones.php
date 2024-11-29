<?php


define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONAES_URL', __DIR__. '/funciones.php');

function incluirTemplate(string $nombre,bool $inicio = false){
    include  TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado() : bool {
    session_start();

    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }
    return false;
}

function dep($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}