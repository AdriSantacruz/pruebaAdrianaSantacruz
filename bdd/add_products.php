<?php 
  header('Access-Control-Allow-Origin: *'); 
  header('Access-Control-Allow-Methods:PUT,GET,POST'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
 
  $params = json_decode($json); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
  
  require("bd.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB
  $nombre=$params->nombre;
  $descripcion=$params->descripcion;
  $precio=$params->precio;
  $conexion = $con; // CREA LA CONEXION
  $query="INSERT INTO productos(nombre, descripcion, precio) VALUES
  ('$nombre','$descripcion','$precio')";    
  // REALIZA LA QUERY A LA DB
  $insert=mysqli_query($conexion,$query );
  
  class Result {}

  // GENERA LOS DATOS DE RESPUESTA
  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'SE REGISTRO EXITOSAMENTE EL USUARIO';

  header('Content-Type: application/json');
  
  echo json_encode($response); // MUESTRA EL JSON GENERADO
?>