<?php 
    require '../../includes/app.php';    
    use App\Infante;

    $infantes = Infante::all();

    $creado = $_GET['creado'] ?? null;
    $actualizado = $_GET['actualizado'] ?? null;
    $eliminado = $_GET['eliminado'] ?? null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?=CARPETA_ROOT?>/build/css/app.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Administrador de infante</title>
</head>
<body>
    
    <?php include_templete('slidebar', 2);?>

    <div class="cont-principal">        
        <div class="alinear-izquierda">
            <p>Infantes | Administrador de infantes</p>
        </div>
        
        <?php if(intval($creado) === 1):?>
            <p class="alerta exito">Registrado correctamente</p>
        <?php elseif(intval($creado) === 2):?>
            <p class="alerta error">Error al crear registro</p>
        <?php endif;?>

        <?php if(intval($actualizado) === 1):?>
            <p class="alerta exito">Registro actualizado con exito</p>
        <?php elseif(intval($actualizado) === 2):?>
            <p class="alerta error">Error al actualizar registro</p>
        <?php elseif(intval($actualizado) === 3):?>
            <p class="alerta error">Consulta invalida</p>
        <?php endif;?>

        <?php if(intval($eliminado) === 1):?>
            <p class="alerta exito">Registro eliminado con exito</p>
        <?php elseif(intval($eliminado) === 2):?>
            <p class="alerta error">Error al eliminar registro</p>
        <?php elseif(intval($eliminado) === 3):?>
            <p class="alerta error">Consulta invalida</p>
        <?php endif;?>


        <div class="alinear-derecha">
            <a href="<?=CARPETA_ROOT?>/admin/infante/nuevo_infante.php" class="btn-verde-inline">Nuevo Infante</a>
        </div>
        
        <div class="contenedor-tabla alinear-centro">
            <table class="elementos">
                <thead>
                    <tr>
                        <th>Nombre(s)</th>
                        <th>Fotografía</th>
                        <th>Brazalete</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($infantes as $infante):?>
                    <tr>
                        <td><?=$infante->APELLIDOS_INFANTE." ".$infante->NOM_INFANTE?></td>
                        <td class="imagen-tabla"><img src="<?=CARPETA_ROOT?>/imagenes/<?=$infante->FOTO ?>"></td>
                        <td><?="# ".$infante->ID_DISPOSITIVO?></td>
                        <td>
                            <div class="alinear-btn">
                                <a href="<?=CARPETA_ROOT?>/admin/infante/ver_infante.php?id=<?=$infante->ID_INFANTE?>" class="btn-azul-redondo"><i class='bx bx-map'></i></a>
                                <a href="#" class="btn-rojo-redondo"> <i class='bx bx-trash' ></i></a>
                                <a href="<?=CARPETA_ROOT?>/admin/infante/editar_infante.php?id=<?=$infante->ID_INFANTE?>" class="btn-amarillo-redondo"><i class='bx bxs-pencil' ></i></a>                                            
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="<?=CARPETA_ROOT?>/build/js/bundle.min.js"></script>
</body>
</html>