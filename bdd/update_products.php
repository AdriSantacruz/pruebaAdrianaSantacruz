<?php 
  header('Access-Control-Allow-Origin: *'); 
  header('Access-Control-Allow-Methods:PUT,GET,POST'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
 $json = file_get_contents('php://input');
 
$params = json_decode($json);

if (!$params) {
    exit("No hay datos para registrar");
}
  $id=$params->id;
  $nombre=$params->nombre;
  $descripcion=$params->descripcion;
  $precio=$params->precio;

  require("bd.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB
  $consulta="UPDATE productos
  SET nombre='$nombre',descripcion='$descripcion',precio='$precio' WHERE id='$id'";
  $conexion = $con; // CREA LA CONEXION
  
  // // REALIZA LA QUERY A LA DB
  $update=mysqli_query($conexion, $consulta);
    
  
  // class Result {}

  // // GENERA LOS DATOS DE RESPUESTA
  // $response = new Result();
  // $response->resultado = 'OK';
  // $response->mensaje = 'EL USUARIO SE ACTUALIZO EXITOSAMENTE';

  header('Content-Type: application/json');

  echo json_encode($update); // MUESTRA EL JSON GENERADO
