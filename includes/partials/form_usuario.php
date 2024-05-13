<form method="POST" action="" class="formulario">
            
    <fieldset>
        <legend>Información del usuario</legend>

        <div class="campo">
            <Label for="nombre">Nombre(s):</Label>
            <input name="usuario[NOM_USER]" id="nombre" class ="input-text" type="text" placeholder="Nombre(s) del usuario" value="<?= s($usuario->NOM_USER)?>">    
        </div>

        <div class="campo">
            <Label for="correo">Correo:</Label>
            <input name="usuario[CORREO_USER]" id="correo" class ="input-text" type="email" placeholder="Email del infante" value="<?= s($usuario->CORREO_USER)?>">    
        </div>
        
        <?php if($tipoForm === 1):?>
            
            <div class="campo">
                <Label for="password">Contraseña:</Label>
                <input name="usuario[CONTRASEÑA_USER]" id="password" class ="input-text" type="password" placeholder="Contraseña del usuario" value="<?= s($usuario->CONTRASEÑA_USER)?>">
            </div>
        <?php elseif($tipoForm === 2):?>
            <div class="campo">
                <Label for="password">Cambiar contraseña:</Label>
                <input name="usuario[CONTRASEÑA_USER]" id="password" class ="input-text" type="password" placeholder="Nueva contraseña del usuario">
            </div>
        <?php endif;?>
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
        <input type="submit" value="Guardar" class="btn-verde-block">
    </div>
</form>