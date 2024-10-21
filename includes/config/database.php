<?php
function conectarDB(){
    $db = mysqli_connect('localhost','root','','bienesraices');

    if (!$db) {
        echo "No se pudo conectar";
        exit;
    }

    return $db;
}