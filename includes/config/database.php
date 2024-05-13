<?php

function conectarDB():mysqli{
    $db = new mysqli('localhost', 'root', '2019601919jJ+', 'bd_infantes');

    if(!$db){
        echo 'Error al conectar con la BD';
        exit;
    }
    return $db;
}