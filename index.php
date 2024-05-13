<?php
    require 'includes/app.php';
    
    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email)$errores[] = "El email es obligatorio o no es valido";
        if(!$password)$errores[] = "La contraseña es obligatoria";

        if(empty($errores)){
            $query = "SELECT * FROM USUARIO WHERE CORREO_USER = '$email'";
            $resultado = mysqli_query($db, $query);
    
            if($resultado->num_rows){
                $usuario = mysqli_fetch_assoc($resultado);
                $auth = password_verify($password, $usuario['CONTRASEÑA_USER']);
    
                if($auth){
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['login'] = true;
                    header('Location: '.CARPETA_ROOT.'/admin/index.php');
                }else
                    $errores [] = "La contraseña es incorrecta";    
            }else
                $errores [] = "El usuario no existe";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CARPETA_ROOT?>/build/css/app.css">
    

    <title>Iniciar Sesión</title>
</head>

<body class="fondo-inicio">
    
    <div class="contenedor-xs">
        <h1 class="titulo-inicio">Sistema de localización de infantes</h1>
        
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?=$error ?>
            </div>
        <?php endforeach;?>

        <form method="POST" action="" class="formulario">
        
            <fieldset>
                <legend>Iniciar Sesión</legend>

                <div class="campo">
                    <Label for="correo">Correo:</Label>
                    <input name="email" id="correo" class ="input-text" type="email" placeholder="Email del infante">    
                </div>
                
                <div class="campo">
                    <Label for="password">Contraseña:</Label>
                    <input name="password" id="password" class ="input-text" type="password" placeholder="Contraseña del usuario">
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


    <script src="<?=CARPETA_ROOT?>/build/js/bundle.min.js"></script>
</body>
</html>