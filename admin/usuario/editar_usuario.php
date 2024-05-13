<?php 
    require '../../includes/app.php';    
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
            <p>Usuarios | Administrador de usuarios | Edicion usuario</p>
        </div>

        <div class="contenedor-m">

            <div class="alinear-izquierda">
                <a href="<?=CARPETA_ROOT?>/admin/usuario/admin_usuario.php" class="btn-azul-inline">Regresar</a>
            </div>

            <form method="POST" action="" class="formulario" enctype="multipart/form-data">
            
                <fieldset>
                    <legend>Información del usuario</legend>

                    <div class="campo">
                        <Label for="nombre">Nombre(s):</Label>
                        <input name="usuario[nombre]" id="nombre" class ="input-text" type="text" placeholder="Nombre(s) del usuario">    
                    </div>

                    <div class="campo">
                        <Label for="correo">Correo:</Label>
                        <input name="usuario[correo]" id="correo" class ="input-text" type="email" placeholder="Email del infante">    
                    </div>
                    
                    <div class="campo">
                        <Label for="password">Contraseña:</Label>
                        <input name="usuario[password]" id="password" class ="input-text" type="password" placeholder="Contraseña del usuario">
                    </div>

                    <div class="checkbox-wrapper">
                        <input type="checkbox" class="check" id="check1-61" onclick="showPass()">
                        <label for="check1-61" class="label">
                            <svg width="45" height="45" viewBox="0 0 95 95">
                                <rect x="30" y="20" width="50" height="50" stroke="black" fill="none"></rect>
                                <g transform="translate(0,-952.36222)">
                                    <path d="m 56,963 c -102,122 6,9 7,9 17,-5 -66,69 -38,52 122,-77 -7,14 18,4 29,-11 45,-43 23,-4" stroke="black" stroke-width="3" fill="none" class="path1"></path>
                                </g>
                            </svg>
                            <span>Ver contraseña</span>
                        </label>
                    </div>

                </fieldset>

                <div class="alinear-derecha">
                    <input type="submit" value="Registrar usuario" class="btn-verde-block">
                </div>
            </form>
        </div>
    </div>
    
    <script src="<?=CARPETA_ROOT?>/build/js/bundle.min.js"></script>
</body>
</html>