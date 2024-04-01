<?php
header("Content-Type:application/json");
include("funciones.php");

if(!empty($_GET['nombre_curso']) && !empty($_GET['precio']) && !empty($_GET['categoria'])) {
    $nombre_curso = $_GET['nombre_curso'];
    $precio = $_GET['precio'];
    $categoria = $_GET['categoria'];
    
    $respuesta = guardarCurso($nombre_curso, $precio, $categoria);

    if($respuesta != "Agregado") {
        responder(200, "Curso NO agregado", NULL);
    } else {
        responder(200, "Curso agregado", $nombre_curso);
    }
} else {
    responder(400, "Solicitud inválida", NULL);
}

function responder($status,$mensaje,$respuesta)
{
    //cabecera del mensaje
    header("HTTP/1.1 $status $mensaje");

    //array asociativo response
    $response['status']=$status;
    $response['mensaje']=$mensaje;
    $response['respuesta']=$respuesta;

    //construccion y retorno del objeto json
    $json_response=json_encode($response);
    echo $json_response;
}
?>
