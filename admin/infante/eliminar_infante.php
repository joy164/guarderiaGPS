<?php
    require '../../includes/app.php';    
    use App\Infante;

    estaAutenticado();

    $ID = $_GET['id'] ?? 0;

    filtrarID($ID, CARPETA_ROOT.'/admin/infante/admin_infante.php?eliminado=3');

    $resultado = Infante::delete($ID);

    if($resultado)
        header('Location: '.CARPETA_ROOT.'/admin/infante/admin_infante.php?eliminado=1');
    else
        header('Location: '.CARPETA_ROOT.'/admin/infante/admin_infante.php?eliminado=2');

    