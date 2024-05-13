<?php 
    require '../../includes/app.php';    
    use App\Usuario;
    estaAutenticado();
    
    $usuario = new Usuario;
    $tipoForm = 1;
    $errores = Usuario::get_errores();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $usuario = new Usuario($_POST['usuario']);
        $errores = $usuario->validar();

        if(empty($errores)){
            $usuario->hashPass();
            $resultado = $usuario->create();

            if($resultado)
                header('Location: '.CARPETA_ROOT.'/admin/usuario/admin_usuario.php?creado=1');
            else
                header('Location: '.CARPETA_ROOT.'/admin/usuario/admin_usuario.php?creado=2');
        }
    }
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
    
    <?php include_templete('slidebar', 3);?>

    <div class="cont-principal">
        <div class="alinear-izquierda">
            <p>Usuarios | Administrador de usuarios | Registro de nuevo usuario</p>
        </div>

        <div class="contenedor-m">

            <div class="alinear-izquierda">
                <a href="<?=CARPETA_ROOT?>/admin/usuario/admin_usuario.php" class="btn-azul-inline">Regresar</a>
            </div>

            <?php foreach($errores as $error):?>
                <div class="alerta error"><?=$error?></div>
            <?php endforeach;?>

            <?php include '../../includes/partials/form_usuario.php'?>
        </div>
    </div>
    
    <script src="<?=CARPETA_ROOT?>/build/js/bundle.min.js"></script>
</body>
</html>