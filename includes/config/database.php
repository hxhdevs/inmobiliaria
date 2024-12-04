<?php
function conectarDB() : mysqli{
    $db = new mysqli('localhost','root','','bienesraices');

    if (!$db) {
        echo "No se pudo conectar";
        exit;
    }

    return $db;
}