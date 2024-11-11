<?php
require 'includes/config/database.php';
$db=conectarDB();

$email = "correo@mail.com";
$password="123123";

$query = "INSERT INTO usuarios (email,password) VALUES ('${email}','${password}');";


echo $query;
mysqli_query($db,$query);
?>