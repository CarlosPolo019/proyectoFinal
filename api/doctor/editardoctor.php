<?php  

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require '../connectdb.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $contents = file_get_contents("php://input");   
    $request = json_decode($contents,true);  
    $nombre = $request["nombre"];
    $direccion = $request["direccion"];
    $telefono = $request["telefono"];
    $id_hospital = intval($request["id_hospital"]);
    $experiencia = $request["experiencia"];
        $tipo_sangre = $request["tipo_sangre"];

    $id = intval($request["id"]);

    // verifica que no esten vacio los campos
     if(!empty($direccion) && !empty($nombre) && !empty($telefono) && !empty($id_hospital) && !empty($experiencia) && !empty($id)){
        // Prepare an insert statement
        $sql = "UPDATE tbldoctor SET nombre=?,direccion=?,telefono=?,id_hospital=?,experiencia=?,tipo_sangre=? where id=?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // asignar parametros
            mysqli_stmt_bind_param($stmt, "sssissi", $param_nombre,$param_direccion,$param_telefono,$param_id_hospital,$param_experiencia,$param_tipo_sangre,$param_id);
            
            //asignar valor a los parametro
     $param_nombre = $nombre;
     $param_direccion = $direccion;
     $param_telefono = $telefono;
     $param_id_hospital = $id_hospital;
     $param_experiencia = $experiencia;
     $param_tipo_sangre=$tipo_sangre;
     $param_id = $id;   
            

    class Result {}

    $response = new Result();

            // ejecutar sentencia
            if(mysqli_stmt_execute($stmt)){
                
                http_response_code(200);

                 $response->resultado = 'OK';
                 $response->mensaje = 'Doctor Modificado';
                  header('Content-Type: application/json');
    echo json_encode($response);      

            } else{
            header('HTTP/1.1 400 ');
            exit(0);
            }

   
           
        }
         // cerrar sentencia 
         mysqli_stmt_close($stmt);
    }else{
         header('HTTP/1.1 400');
            exit(0);
    }
    
    // cerrar la conexion
    mysqli_close($con);

}else{
    echo "no fue posible realizar la edicion";
}




?>

