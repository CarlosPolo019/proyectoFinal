<?php

header("Access-Control-Allow-Origin: *");
require '../connectdb.php';
error_reporting(E_ERROR);
$pacientes = [];
$sql = "select * from tblpaciente ";

if($result = mysqli_query($con,$sql)){
    $id = 0;
    while($row = mysqli_fetch_assoc($result)){
        $pacientes[$id]['id'] = $row['id'];
        $pacientes[$id]['nombre'] = $row['nombre'];
        $pacientes[$id]['telefono'] = $row['telefono'];
        $pacientes[$id]['direccion'] = $row['direccion'];
        $pacientes[$id]['eps'] = $row['eps'];
        $pacientes[$id]['nombre_acom'] = $row['nombre_acom'];
        $pacientes[$id]['telefono_acom'] = $row['telefono_acom'];

        $id++;
    }

    header('Content-type: application/json');
    echo json_encode($pacientes);

}else{
     header('HTTP/1.1 400 Hubo un problema, verifique la tabla paciente');
            exit(0);
}

?>