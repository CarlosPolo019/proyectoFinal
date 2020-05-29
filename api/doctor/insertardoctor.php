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
    $fecha_nacimiento = $request["fecha_nacimiento"];
    $tipo_sangre = $request["tipo_sangre"];
    $id_hospital = intval($request["id_hospital"]);
    $experiencia = $request["experiencia"];
   
        // verifica que no esten vacio los campos
    if(!empty($nombre) && !empty($direccion) && !empty($telefono) && !empty($tipo_sangre)){
      
  $sql = "INSERT INTO tbldoctor(nombre,direccion,telefono,fecha_nacimiento,tipo_sangre,experiencia,id_hospital)
VALUES(?,?,?,?,?,?,?)";
        
    
if($stmt = mysqli_prepare($con, $sql)){
            // asignar parametros
           
         mysqli_stmt_bind_param($stmt, "ssssssi",$param_nombre,$param_direccion,$param_telefono,$param_fecha_nacimiento,$param_tipo_sangre,$param_experiencia,$param_id_hospital);
            
            //asignar valor a los parametros

     $param_nombre = $nombre;
     $param_direccion = $direccion;
     $param_telefono = $telefono;
     $param_id_hospital = $id_hospital;
     $param_experiencia = $experiencia;
     $param_tipo_sangre = $tipo_sangre;
     $param_fecha_nacimiento = $fecha_nacimiento;

    class Result {}

    $response = new Result();
            // ejecutar sentencia
            if(mysqli_stmt_execute($stmt)){
                
            
       
                http_response_code(200);
                //echo json_encode($tabResultat);

    $response->resultado = 'OK';
    $response->mensaje = 'Doctor creado Correctamente ';

    header('Content-Type: application/json');
     echo json_encode($response);  

            }else{

   header('HTTP/1.1 400 No se pudo crear el paciente');
            exit(0);
            }

        }
         // cerrar sentencia 
         mysqli_stmt_close($stmt);
         
    }else{

        header('HTTP/1.1 400');
            exit(0);

    }
       mysqli_close($con);

}else{
    echo "no fue posible realizar la creacion";
}


?>

