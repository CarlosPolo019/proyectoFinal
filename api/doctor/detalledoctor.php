<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require '../connectdb.php';

$pacientes = [];
$id_doctor = $_GET["id"];

$id = strval($id_doctor);
$sql = "select * from tbldoctor where id = ".$id;

if($result = mysqli_query($con,$sql)){
    

    //obtiene y verifica que exista al menos 1 registro
    if(mysqli_num_rows($result) == 1){
        //recorre el resultado y lo convierte en un array
        $row = mysqli_fetch_array($result);
        
        // Retrieve individual field value
    $nombre = $row["nombre"];
    $direccion = $row["direccion"];
    $telefono = $row["telefono"];
    $fecha_nacimiento = $row["fecha_nacimiento"];
    $tipo_sangre = $row["tipo_sangre"];
    $id_hospital = $row["id_hospital"];
    $experiencia = $row["experiencia"];

        class Result {}

        $response = new Result();
        $response->id = $id;
        $response->nombre = $nombre;
        $response->direccion = $direccion;
        $response->telefono = $telefono;
        $response->tipo_sangre = $tipo_sangre;
        $response->id_hospital = $id_hospital;
        $response->experiencia = $experiencia;
        $response->fecha_nacimiento = $fecha_nacimiento;

        header('Content-Type: application/json');
        echo json_encode($response);   


    } else{
             header('HTTP/1.1 400');
            exit(0);
    }

}else{
         header('HTTP/1.1 400');
            exit(0);
}
?>