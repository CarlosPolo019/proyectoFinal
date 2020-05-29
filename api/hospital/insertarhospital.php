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
    $nombre_representante = $request["nombre_representante"];
    $nit = $request["nit"];
   
   
        // verifica que no esten vacio los campos
    if(!empty($nombre) && !empty($direccion) && !empty($telefono) && !empty($nit) && !empty($nombre_representante)){
      
  $sql = "INSERT INTO tblhospital(nombre,direccion,telefono,nit,nombre_representante)
VALUES(?,?,?,?,?)";
        
    
if($stmt = mysqli_prepare($con, $sql)){
            // asignar parametros
           
         mysqli_stmt_bind_param($stmt, "sssss",$param_nombre,$param_direccion,$param_telefono,$param_nit,$param_nombre_repr);
            
            //asignar valor a los parametros

     $param_nombre = $nombre;
     $param_direccion = $direccion;
     $param_telefono = $telefono;
     $param_nit = $nit;
     $param_nombre_repr = $nombre_representante;
   
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
       mysqli_close($con);

}else{
    echo "no fue posible realizar la creacion";
}


?>

