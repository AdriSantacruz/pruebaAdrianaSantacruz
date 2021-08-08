<?php

$bd="localhost";
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "prueba";

$con=mysqli_connect($bd,$usuario,$contraseña,$nombre_base_de_datos);
if(!$con){
    die("Connection Failed: " .mysqli_connect_error());
}

?>