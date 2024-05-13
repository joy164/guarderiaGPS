<div id="sidebar" <?=$opc===1?"class=\"active\"":""?> >
    <div class="toggle-btn">
        <i class='bx bx-menu bx-lg'></i>
    </div>

    <ul class="no-pading">

        <li class="img-logo">
            <img src="<?=CARPETA_ROOT?>/build/img/logo.png" alt="imagen logo" width="5%">
        </li>
    
        <a href="<?=CARPETA_ROOT?>/logout.php">
            <li class="btn-logout">Cerrar sesión</li>
        </a>
    
        <a href="<?=CARPETA_ROOT?>/admin/index.php">
            <li <?=$opc===1?"class=\"btn-active\"":""?> >Inicio</li>
        </a>
        
        <a href="<?=CARPETA_ROOT?>/admin/infante/admin_infante.php">
            <li <?=$opc===2?"class=\"btn-active\"":""?>>Infantes</li>
        </a>

        <a href="<?=CARPETA_ROOT?>/admin/usuario/admin_usuario.php">
            <li <?=$opc===3?"class=\"btn-active\"":""?>>Usuarios</li>
        </a>
        
    </ul>
</div>