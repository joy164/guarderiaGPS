<?php

define('TEMPLETES_URL', __DIR__.'/partials');
define('FUNCIONES_URL', __DIR__.'funciones.php');
define('CARPETA_IMG', __DIR__.'/../imagenes/');
define('CARPETA_ROOT', '/guarderiaGPS');

function include_templete(string $nombre, int $opc = 0){
    include TEMPLETES_URL."/$nombre.php";
}

function limitar_cadena($cadena, $limite, $sufijo):string{
    // Si la longitud es mayor que el límite...
    if(strlen($cadena) > $limite){
        // Entonces corta la cadena y ponle el sufijo
        return substr($cadena, 0, $limite) . $sufijo;
    }
    
    // Si no, entonces devuelve la cadena normal
    return $cadena;
}

function estaAutenticado():void{
    session_start();
    
    if(!$_SESSION['login'])
    header('Location: '.CARPETA_ROOT.'/index.php');
}

function filtrarID(string $id, string $url):void{
    if($id == 0)header('Location: '. $url);

    if(!filter_var($id, FILTER_VALIDATE_INT))
        header('Location: '. $url);
}

function s($html):string{
    $s = htmlspecialchars($html);
    return $s;
}

function debug($variable){
    echo'<pre>';
    var_dump($variable);
    echo'</pre>';
    exit;
}