<?php
    require 'includes/app.php';


    $LAT = $_POST['LAT'];
    $LON = $_POST['LON'];
    $ID_BRAZALETE = $_POST['ID_BRAZALETE'];
    
    //insertar en la base de datos
    $query = "UPDATE INTO INFANTE SET LAT = $LAT, LON = $LON AND ID_BRAZALETE = '$ID_INFANTE'";
    $resultado = $db->query($query);
        
    if($resultado){
            echo 'Datos registrados';
    }else{
        echo 'Error al registrar posicion';
    }

