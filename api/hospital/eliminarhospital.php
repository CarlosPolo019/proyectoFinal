<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require '../connectdb.php';

$pacientes = [];
$id_paciente = $_GET["id"];

$id = strval($id_paciente);
$sql = "DELETE FROM tblhospital where id=".$id;

if($result = mysqli_query($con,$sql)){
    
    http_response_code(200);
    class Result {}

    $response = new Result();
    $response->resultado = 'OK';
    $response->mensaje = 'datos eliminados';

    header('Content-Type: application/json');
    echo json_encode($response);  


}else{
     header('HTTP/1.1 400 No se pudo eliminar el paciente');
            exit(0);
        }

?>