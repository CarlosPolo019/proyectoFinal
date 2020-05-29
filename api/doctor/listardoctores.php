<?php

header("Access-Control-Allow-Origin: *");
require '../connectdb.php';
error_reporting(E_ERROR);
$doctor = [];
$sql = "select * from tbldoctor" ;

if($result = mysqli_query($con,$sql)){
    $id = 0;
    while($row = mysqli_fetch_assoc($result)){
        $doctor[$id]['id'] = $row['id'];
        $doctor[$id]['nombre'] = $row['nombre'];
        $doctor[$id]['telefono'] = $row['telefono'];
        $doctor[$id]['tipo_sangre'] = $row['tipo_sangre'];
        $doctor[$id]['fecha_nacimiento'] = $row['fecha_nacimiento'];
        $doctor[$id]['experiencia'] = $row['experiencia'];
        $doctor[$id]['hospital'] = $row['id_hospital'];
        $id++;
    }

    header('Content-type: application/json');
    echo json_encode($doctor);

}else{
     header('HTTP/1.1 400 ');
            exit(0);
}

?>