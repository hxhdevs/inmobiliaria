<?php
require 'includes/config/database.php';
$db=conectarDB();

$email = "correo@mail.com";
$password="123123";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$query = "INSERT INTO usuarios (email,password) VALUES ('${email}','${passwordHash}');";

mysqli_query($db,$query);
?>