<?php

// Conexión a la base de datos (ajusta la configuración de acuerdo a tu servidor)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectoec";

$mysqli = new mysqli($servername, $username, $password, $dbname, 3307);
// if (!$mysqli) {
//     die("Error de conexión a la base de datos: " . mysqli_connect_error());
// }else{
//     die("");
// }


?>