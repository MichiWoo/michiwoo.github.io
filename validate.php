<?php
// Inicializamos variables de mensajes y JSON
include("conexion.php");

session_start();

$usuario = $_GET["usuario"];
$contrasena = $_GET["pass"];

$sSQL = "SELECT * FROM usuarios WHERE nombre_usuario='" . $usuario . "' AND pass_usuario=MD5('" . $contrasena . "')";

if ($rs = mysqli_query($conexion, $sSQL)){
    
        $rssi = mysqli_fetch_array($rs, MYSQLI_ASSOC);
    
        if (mysqli_num_rows($rs)!=0) {

            $idUsuarioCon = $rssi["id_usuario"];    
            $nombreUsuarioCon = $rssi["nombre_usuario"];    
            $passUsuarioCon = $rssi["pass_usuario"];    
            $mailUsuarioCon = $rssi["correo_usuario"];    
             
            $successok = true;
            $respuestaoK = 'Usuario Correcto';
            $salidaJson = array(
                "success" => $successok, 
                "idUsuario" => $idUsuarioCon,
                "nombreUsuario" => $nombreUsuarioCon,
                "emailUsuario" => $mailUsuarioCon,
                "passUsuario" => $passUsuarioCon
            );
            echo json_encode($salidaJson);
            
         }
         else {
             
             $successok = false;
             $respuestaoK = 'Error al iniciar sesi&oacute;n, revise su usuario y/o contrase&ntilde;a.';
             $salidaJson = array("success" => $successok, "respuesta" => $respuestaoK);
             echo json_encode($salidaJson);
             
         }
     }

mysqli_close ($conexion);

?>