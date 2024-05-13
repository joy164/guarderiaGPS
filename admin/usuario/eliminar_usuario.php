<?php
    require '../../includes/app.php';    
    use App\Usuario;

    estaAutenticado();

    $ID = $_GET['id'] ?? 0;

    filtrarID($ID, CARPETA_ROOT.'/admin/usuario/admin_usuario.php?eliminado=3');

    $resultado = Usuario::delete($ID);

    if($resultado)
        header('Location: '.CARPETA_ROOT.'/admin/usuario/admin_usuario.php?eliminado=1');
    else
        header('Location: '.CARPETA_ROOT.'/admin/usuario/admin_usuario.php?eliminado=2');
