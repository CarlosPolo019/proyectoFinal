<?php

header("Access-Control-Allow-Origin: *");
require '../connectdb.php';
error_reporting(E_ERROR);
$pacientes = [];
$sql = "select * from tblhospital";

if($result = mysqli_query($con,$sql)){
    $id = 0;
    while($row = mysqli_fetch_assoc($result)){
        $pacientes[$id]['id'] = $row['id'];
        $pacientes[$id]['nombre'] = $row['nombre'];
        $id++;
    }
    header('Content-type: application/json');
    echo json_encode($pacientes);

}else{
     header('HTTP/1.1 400');
            exit(0);
}

?>