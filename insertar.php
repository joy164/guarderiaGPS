<?php
    require 'includes/app.php';
    
    $LAT = $_POST['LAT'];
    $LON = $_POST['LON'];
    $ID_DISPOSITIVO = $_POST['ID_DISPOSITIVO'];
    
    $query = "UPDATE INFANTE SET LAT={$LAT}, LON={$LON} WHERE ID_DISPOSITIVO ={$ID_DISPOSITIVO}";
    $nueva_consulta = $db->prepare($query);
    
    if($nueva_consulta){
    
        if($nueva_consulta->execute()){
            echo 'Datos registrados';
        }else{
            echo 'Error al registrar los datos';
        }
    }else{
        echo 'Error al preparar la consulta';
    }

