<?php 
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods:PUT,GET,POST');  
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

  require("bd.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB

  //$json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
  $id=$_GET['id'];
  
   // CREA LA CONEXION
  $consulta="SELECT * FROM productos WHERE id='$id'";
  
  // REALIZA LA QUERY A LA DB
  $query = mysqli_query($con,$consulta);
  //echo json_encode($query);
 
  // // SI EL USUARIO EXISTE OBTIENE LOS DATOS Y LOS GUARDA EN UN ARRAY
  if ($query) {
    $array = array();
    while ($fila = mysqli_fetch_assoc($query)) {	//convierte en un array 
        // echo json_encode($fila);
        $data[] = array_map('utf8_encode', $fila);//mapear la base de datos 
    }
}else{
    echo "fallo no hay nada";
    $res = null;
    echo mysqli_error($con);
}

$res = $data;

echo json_encode($res); 
echo mysqli_error($con);

?>