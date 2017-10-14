<?php
    $host_name  = "localhost";
    $database   = "qxr427";
    $user_name  = "";
    $password   = "";

    $conexion = mysqli_connect($host_name, $user_name, $password, $database);
    if (mysqli_connect_errno())
    {
    echo "Error al conectar con servidor MySQL: " . mysqli_connect_error();
    }
?>

