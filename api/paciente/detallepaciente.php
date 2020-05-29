<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require '../connectdb.php';

$pacientes = [];
$id_paciente = $_GET["id"];

$id = strval($id_paciente);
$sql = "select * from tblpaciente where id=".$id;

if($result = mysqli_query($con,$sql)){
    
    
    
    //obtiene y verifica que exista al menos 1 registro
    if(mysqli_num_rows($result) == 1){
        //recorre el resultado y lo convierte en un array
        $row = mysqli_fetch_array($result);
        
        // Retrieve individual field value
    $nombre = $row["nombre"];
    $direccion = $row["direccion"];
    $telefono = $row["telefono"];
    $nombre_acom = $row["nombre_acom"];
    $telefono_acom = $row["telefono_acom"];
    $eps = $row["eps"];


        class Result {}

        $response = new Result();
        $response->id = $id;
        $response->nombre = $nombre;
        $response->direccion =  $direccion;
        $response->telefono = $telefono;
        $response->eps = $eps;
        $response->nombre_acom = $nombre_acom;
        $response->telefono_acom = $telefono_acom;

      
        
        header('Content-Type: application/json');
        echo json_encode($response);   


    } else{
             header('HTTP/1.1 400 no existe ningun registro');
            exit(0);
    }

}else{
         header('HTTP/1.1 400 No se pudo consultar el paciente');
            exit(0);
}
?>