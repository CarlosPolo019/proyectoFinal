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
    $nit = $request["nit"];
        $nombre_representante = $request["nombre_representante"];

    $id = intval($request["id"]);

    // verifica que no esten vacio los campos
     if(!empty($direccion) && !empty($nombre) && !empty($telefono) && !empty($nit) && !empty($telefono) && !empty($id)){
        // Prepare an insert statement
        $sql = "UPDATE tblhospital SET nombre=?,direccion=?,telefono=?,nit=?,nombre_representante=? where id=?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // asignar parametros
            mysqli_stmt_bind_param($stmt, "sssssi", $param_nombre,$param_direccion,$param_telefono,$param_nit,$param_nombre_repr,$param_id);
            
            //asignar valor a los parametro
     $param_nombre = $nombre;
     $param_direccion = $direccion;
     $param_telefono = $telefono;
     $param_nit = $nit;
     $param_nombre_repr = $nombre_representante;
     $param_id = $id;   
            

    class Result {}

    $response = new Result();

            // ejecutar sentencia
            if(mysqli_stmt_execute($stmt)){
                
                http_response_code(200);

                 $response->resultado = 'OK';
                 $response->mensaje = 'Hospital Modificado';
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

