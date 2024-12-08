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