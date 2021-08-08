<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

require('bd.php');
$get = mysqli_query($con, "SELECT * FROM productos");

if ($get) {
    $array = array();
    while ($fila = mysqli_fetch_assoc($get)) {	//convierte en un array 
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