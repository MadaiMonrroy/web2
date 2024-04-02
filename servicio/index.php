<?php
    header("Content-Type:application/json");
    //cabecera del documento json
    include("funciones.php");
    //incluimos funciones.php

    //si no esta vacio en GET el campo producto
    if(!empty($_GET['nombre']) && !empty($_GET['dato']))
    {
        $nombre_curso=$_GET['nombre'];
        $dato=$_GET['dato'];
        if ($dato=="precio"||$dato=="categoria"){
            $result= mostrarAtributo($nombre_curso, $dato);
        }else{
            $result="";
        }


        if($result!=""){
            responder(200, "ENCONTRADOGIT", $result);
        }
    }else{
        $respuesta = obtenerCursos();
        responder(200,"LISTA DE CURSOS", $respuesta); 
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
