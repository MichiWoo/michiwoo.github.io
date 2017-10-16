<?php
    $host_name  = "mysql.hostinger.mx";
    $database   = "u112460988_pwoo";
    $user_name  = "u112460988_wooad";
    $password   = "jPzk2RlM4Wv5";

    $conexion = mysqli_connect($host_name, $user_name, $password, $database);
    if (mysqli_connect_errno())
    {
    echo "Error al conectar con servidor MySQL: " . mysqli_connect_error();
    }
?>

