<?php 
    require '../includes/app.php';
    estaAutenticado();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CARPETA_ROOT?>/build/css/app.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Administrador</title>
</head>
<body>
    
    <?php include_templete('slidebar', 1);?>

    <div class="cont-principal">
        <div>
            <h1 class="no-margin alinear-izquierda">Administrador de localización de infantes</h1>
            <p>Bienvenido al sistema de de locaclizacion de infantes</p>
            <p>Funciones:</p>
            <ul>
                <li>Registrar y administrar a los infantes y sus grupos</li>
                <li>Registrar y administrar a los Usuarios que tienen en el sistema</li>
            </ul>
        </div>
    </div>
    
    <script src="<?=CARPETA_ROOT?>/build/js/bundle.min.js"></script>
</body>
</html>