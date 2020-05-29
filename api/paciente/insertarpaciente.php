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
    $nombre_acom = $request["nombre_acom"];
    $telefono_acom = $request["telefono_acom"];
    $eps = $request["eps"];
        // verifica que no esten vacio los campos
        // 

    if(!empty($nombre) && !empty($direccion) && !empty($telefono) && !empty($eps)){
        // Prepare an insert statement
        $sql = "INSERT INTO tblpaciente(nombre,direccion,telefono,eps,nombre_acom,telefono_acom)
VALUES(?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // asignar parametros
           
            mysqli_stmt_bind_param($stmt, "ssssss",$param_nombre,$param_direccion,$param_telefono,$param_eps,$param_nombre_acom,$param_telefono_acom);
            
            //asignar valor a los parametros

     $param_nombre = $nombre;
     $param_direccion = $direccion;
     $param_telefono = $telefono;
     $param_eps = $eps;
     $param_nombre_acom = $nombre_acom;
     $param_telefono_acom = $telefono_acom;

      class Result {}

    $response = new Result();
            // ejecutar sentencia
            if(mysqli_stmt_execute($stmt)){
                
    http_response_code(200);
    $response->resultado = 'OK';
    $response->mensaje = 'Paciente creado Correctamente ';

    header('Content-Type: application/json');
    echo json_encode($response);  

            }else{

   header('HTTP/1.1 400');
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
    echo "no fue posible realizar la creacion";
}



?>

