<?php 
    require '../../includes/app.php';    
    use App\Infante;
    estaAutenticado();

    $ID = $_GET['id'] ?? 0;

    filtrarID($ID, CARPETA_ROOT.'/admin/infante/admin_infante.php?actualizado=3');

    $errores = Infante::get_errores();
    $infante = Infante::find($ID);
    $tipoForm = 2;
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $infante->sincronizarObjeto($_POST['infante']);
        
        $imagen = $_FILES['imagen'];
        $nombreImagen = md5( uniqid(rand(), true) ).".jpg";

        if($imagen['name']){
            if(!is_dir(CARPETA_IMG))
                mkdir(CARPETA_IMG);
            
            if(move_uploaded_file($imagen['tmp_name'], CARPETA_IMG.$nombreImagen)){
                unlink(CARPETA_IMG.$infante->FOTO);
                $infante->set_imagen($nombreImagen);
            }    
        }

        $errores = $infante->validar();

        if(empty($errores)){

            $resultado = $infante->update();

            if($resultado){
                move_uploaded_file($imagen['tmp_name'], CARPETA_IMG.$nombreImagen);
                header('Location: '.CARPETA_ROOT.'/admin/infante/admin_Infante.php?actualizado=1');
            }
            else
                header('Location: '.CARPETA_ROOT.'/admin/infante/admin_Infante.php?actualizado=2');
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
    
    <?php include_templete('slidebar', 2);?>

    <div class="cont-principal">
        <div class="alinear-izquierda">
            <p>Infantes | Administrador de infantes | Edicion de infante</p>
        </div>

        <div class="contenedor-m">

            <div class="alinear-izquierda">
                <a href="<?=CARPETA_ROOT?>/admin/infante/admin_infante.php" class="btn-azul-inline">Regresar</a>
            </div>

            <?php foreach($errores as $error):?>
                <div class="alerta error"><?=$error?></div>
            <?php endforeach;?>

            <?php include '../../includes/partials/form_infante.php'?>
        </div>
    </div>
    
    <script src="<?=CARPETA_ROOT?>/build/js/bundle.min.js"></script>
</body>
</html>