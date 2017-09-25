<?php 

$name = $_POST["nombre"];
$email = $_POST["mail"];
$mensaje = $_POST["mensaje"];
$telefono = $_POST["telefono"];

$admin_email = "michiwoo.web@gmail.com";

$contenido = "Nombre: " . $name . "\nTeléfono: " . $telefono . "\nE-mail: " . $email . "\nMensaje: " . $mensaje ;
$asunto1 = "Nombre: " . utf8_decode($name);
$asunto1 = "=?ISO-8859-1?B?".base64_encode($asunto1)."=?=";
$cabeceras2 = "MIME-Version: 1.0\r\n"; 
$cabeceras2 .= "Content-type: text/html; charset=UTF-8\r\n"; 
$cabeceras2 .= "From:" . $email . "\r\n";

    if (mail($admin_email, $asunto1, $contenido, $cabeceras2)) {
    
        $destinatario = $email; 
            $asunto = "✉ Solicitud a Michiwoo Webs"; 
            $cuerpo = ' 
            <html> 
            <head> 
                <title>Solicitud recibida en Michiwoo Webs</title>
                <meta charset="utf-8">
            </head> 
            <body>
                
            <center>
                <img src="http://www.michiwooweb.esy.es/images/logo michiwoo.png" width="300">
            
                <div align="justify" style="background-color:#f8f7f7; color:#646464; width:300px; border-bottom:solid 2px 2px 2px 2px #313131; padding: 10px; font-family:Verdana, Geneva, sans-serif; font-size:14px;">
                    
                    <p>Desde <a href="www.michiwoowebs.esy.es"><b>Michiwoo Webs</b></a>, le damos las gracias por comunicarse con nosotros; en un plazo menor de 12 horas nos comunicaremos con Usted. Si no quiere esperar puede ponerse en contacto con nosotros en el siguiente teléfono 017831046302.</p>
                    <br />
                    <p>Le agradecemos la confianza depositada en <a href="www.michiwoowebs.esy.es"><b>Michiwoo Webs </b></a> y esperamos poder ayudarle en la la realización de su página web, aplicación móvil ó cualquier servicio de desarrollo web que requiera.</p>
                    <br />
                    <p>Un saludo.</p>


                    <table width="100%" border="0" cellspacing="10" cellpadding="0" style="border-top-width:3px; border-top-style:solid; border-top-color:#d4c7c3;">
                    <tr>
                    <td></td>
                    </tr>
                    <tr>
                    <td align="left" valign="top" style="padding:10px;">
                    <p><font face="Verdana, Geneva, sans-serif" color="#2a1f1b"  style="font-size:14px;">Michiwoo Web</font><br />    
                    <font face="Verdana, Geneva, sans-serif" color="#71635f"  style="font-size:12px;">2a. de Allende #2, Altos, Centro, Tuxpan, Veracruz, México.</font><br />
                    <font face="Verdana, Geneva, sans-serif" color="#71635f" size="-1">Tlf: <strong><font color="#4a3b37">017831046302</font></strong>    
                    <font face="Verdana, Geneva, sans-serif" color="#4a3b37" size="-1"><a href="mailto:michiwoo.web@gmail.com">michiwoo.web@gmail.com</a></font></p>
                    </td>
                    </tr>
                    </table>

                    <p><small>Aviso Legal: Este correo ha sido enviado por un sistema automático de envíos. De conformidad con lo establecido en la ley 34/2002 LSSICE le comunicamos que este correo electrónico ha sido enviado por hipotecaes10 S.L. (en adelante <a href="www.hipoteca10.es"><b>Hipoteca10</b></a>) con CIF 687794061. Su dirección electrónica ha sido recabada en el marco de los servicios que fueron solicitados por usted desde la pagina web de Hipoteca10, o vía telefónica y habiendo aceptado los términos y condiciones  y política de privacidad de Hipoteca10. De acuerdo con lo establecido en la LOPD, Hipoteca10 le informa que en el supuesto de que no desee recibiendo mas correos pude darse de baja notificándolo por correo electrónico en la siguiente dirección: <a href="mailto:info@hipoteca10.es">INFO@HIPOTECA10.ES</a>. Puede ejercer sus derechos de acceso, rectificación, cancelación y oposición, mediante petición escrita dirigida al departamento de atención al cliente de Hipoteca10, Carrera San Jerónimo 18, planta 4, oficina 5. Madrid 28014. La solicitud deberá contener los siguientes datos: nombre y apellidos, domicilio a efectos de notificación, fotocopia del DNI, o tarjeta de residencia en vigor, o pasaporte en vigor, que acredite de manera fehaciente su identidad, y petición concreta.</small></p>
                    <p><small>El contenido de esta comunicación está sujeto al deber de secreto y va dirigido exclusivamente a su destinatario. En el supuesto de que Usted no fuera el destinatario, le pedimos que nos lo indique y no difunda su contenido a terceros, procediendo a su destrucción.</small></p>
                

                    <p><small>No respondas a este correo es automático.</small></p>
                </div>
            </center>
            </body> 
            </html> 
            '; 
            
        $cabeceras = "MIME-Version: 1.0\r\n"; 
        $cabeceras .= "Content-type: text/html; charset=UTF-8\r\n"; 
        $cabeceras .= "From: Michiwoo Webs <michiwoo.web@gmail.com>\r\n";

        if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {

            $successok = true;
            $respuestaoK = 'El E-mail se envío Correctamente';
            $salidaJson = array("success" => $successok, "respuesta" => $respuestaoK);
            echo json_encode($salidaJson);
            }
    
    } else {
        $successok = false;
        $respuestaoK = 'El E-mail no se pudo enviar =(';
        $salidaJson = array("success" => $successok, "respuesta" => $respuestaoK);
        echo json_encode($salidaJson);
    }

    mysqli_close ($conexion);
?>