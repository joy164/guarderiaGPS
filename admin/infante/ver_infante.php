<?php 
    require '../../includes/app.php';    
    use App\Infante;

    $ID = $_GET['id'] ?? 0;

    filtrarID($ID, CARPETA_ROOT.'/admin/admin_infante.php?actualizado=3');
    
    $infante = Infante::find($ID);
    $tipoForm = 3;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CARPETA_ROOT?>/build/css/app.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <title>Administrador</title>
</head>
<body>
    
    <div class="cont-principal">
        <div class="alinear-centro">
            <p>Localizacion del infante: <?=$infante->NOM_INFANTE?></p>
        </div>

        <div class="contenedor-m">

            <!-- <div class="alinear-izquierda">
                <a href="<?=CARPETA_ROOT?>/admin/infante/admin_infante.php" class="btn-azul-inline">Regresar</a>
            </div> -->

            <?php include '../../includes/partials/form_infante.php'?>
        </div>
    </div>
    
    <script src="<?=CARPETA_ROOT?>/build/js/bundle.min.js"></script>
</body>
</html>