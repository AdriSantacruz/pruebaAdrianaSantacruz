<?php 
  header('Access-Control-Allow-Origin: *'); 
  header('Access-Control-Allow-Methods:PUT,GET,POST,DELETE'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  require("bd.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB

  $conexion = $con; // CREA LA CONEXION
  
  // REALIZA LA QUERY A LA DB
  mysqli_query($conexion, "DELETE FROM productos WHERE id=$_GET[id]");
    
  
  class Result {}

  // GENERA LOS DATOS DE RESPUESTA
  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'EL USUARIO SE ELIMINO EXITOSAMENTE';

  header('Content-Type: application/json');

  echo json_encode($response); // MUESTRA EL JSON GENERADO
?>