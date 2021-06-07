<?php   
header('Content-Type: application/json');
//ejemplo de ruta http://localhost:8080/<dir_proyecto>/api/usuarios.php <- la ruta virtual

include '../conexion.php';

//recibir contenido en formato JSON
//$contenido = file_get_contents('php://input');  contenido = a lo que obtengas de la entrada de datos


//Recibir las peticiones de los usuarios
switch($_SERVER['REQUEST_METHOD']){
    //Obtener un usuarios
    case 'GET': 
        if(isset($_GET['id'])){
            // se recibe directo de la url, ejem: localhost/usaurios?id=123
            $respuesta['datos'] = $_GET;
            $respuesta['mensaje'] = "Datos consultados";
            echo json_encode($respuesta,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        } else {
            echo "No hay usuarios por mostrar o se mostraran todos los usarios";
        }           
        
    break;
    //Crear usuario POST
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true); // guarda en la variable global POST el JSON como array asociativo(de ahi el true) en el metodo/funcion json_encode; 
        
        print_r($_POST['datos']);

        $respuesta['datos'] = json_decode($_POST['datos'],true);
        /*
        if($respuesta['datos']['curp'] != consulta de la curp){
            $respuesta['mensaje'] = "no se arma";
            echo json_encode($respuesta['menasje']);
        }
        */
        print_r($respuesta);

        try{
            $stmt = $conn->prepare("INSERT INTO vendedores (CURP, Nombre, Apellido_Paterno, Apellido_Materno, Fotografia, Numero_Telefono, Correo_electronico, Fecha_ingreso, Fecha_administrador, Fecha_validacion, Contrasena, Validado, Tipo)
            VALUES (:CURP, :Nombre, :Apellido_Paterno, :Apellido_Materno, :Fotografia, :Numero_Telefono, :Correo_electronico, :Fecha_ingreso, :Fecha_administrador, :Fecha_validacion, :Contrasena, :Validado, :Tipo)");
            $stmt->bindParam(':CURP', $respuesta['datos']['curp']);
            $stmt->bindParam(':Nombre', $respuesta['datos']['nombre']);
            $stmt->bindParam(':Apellido_Paterno', $respuesta['datos']['ape1']);
            $stmt->bindParam(':Apellido_Materno',$respuesta['datos']['ape2']);
            $stmt->bindParam(':Fotografia',$respuesta['datos']['image']);
            $stmt->bindParam(':Numero_Telefono',$respuesta['datos']['tel']);
            $stmt->bindParam(':Correo_electronico',$respuesta['datos']['email']);
            $stmt->bindParam(':Fecha_ingreso',$respuesta['datos']['fecha_ing']);
            $stmt->bindParam(':Fecha_administrador',$respuesta['datos']['fecha_admin']);
            $stmt->bindParam(':Fecha_validacion',$respuesta['datos']['fecha_val']);
            $stmt->bindParam(':Contrasena',$respuesta['datos']['contrasena']);
            $stmt->bindParam(':Validado',$respuesta['datos']['validado']);
            $stmt->bindParam(':Tipo',$respuesta['datos']['tipo']);
        
            $stmt->execute();

            echo $respuesta['mensaje'] = "Se creo un usuario con exito";

            $conn = null; 
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
           
        
         
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    break;
    //modificar un usuario PUT
    case 'PUT':
        if(isset($_GET['id'])){
            
            $_PUT = json_decode(file_get_contents('php://input'), true);
            $_PUT['nombre'] = "Carlo";
            $respuesta['datos'] = $_PUT;
            $respuesta['mensaje'] = "Se cambiaron los datos del usuario."; 
            echo json_encode($respuesta, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
            

        } else {
            echo "Intentaste actualizar sin antes haber seleccionado un usuario";
        }
        
    break;
    //Eliminar un usuario DELETE
    case 'DELETE':
        if(isset($_GET['id'])){
            $_DELETE = json_decode(file_get_contents('php://input'), true);
            $_DELETE['validado'] = false;
            $respuesta['datos'] = $_DELETE;
            $respuesta['mensaje'] = "Se suspendio el usaurio.";
            echo json_encode($respuesta,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        } else {
            echo "Se intento suspender un usuario sin antes haber seleccionado su id";
        }
        
    break;
}

?>