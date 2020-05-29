<?php

header("Access-Control-Allow-Origin: *");
require '../connectdb.php';
error_reporting(E_ERROR);
$hospital = [];
$sql = "select * from tblhospital";

if($result = mysqli_query($con,$sql)){
    $id = 0;
    while($row = mysqli_fetch_assoc($result)){
        $hospital[$id]['id'] = $row['id'];
        $hospital[$id]['nombre'] = $row['nombre'];
                $hospital[$id]['nit'] = $row['nit'];

        $hospital[$id]['nombre_representante'] = $row['nombre_representante'];
        $hospital[$id]['telefono'] = $row['telefono'];

        $hospital[$id]['direccion'] = $row['direccion'];
        $id++;
    }
    header('Content-type: application/json');
    echo json_encode($hospital);

}else{
     header('HTTP/1.1 400');
            exit(0);
}

?>