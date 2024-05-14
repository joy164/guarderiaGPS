<form method="POST" action="" class="formulario" enctype="multipart/form-data">

    <fieldset>
        <legend>Información basica</legend>
        
        <?php if($tipoForm === 2 || $tipoForm === 3):?>
            <img src="<?=CARPETA_ROOT?>/imagenes/<?=$infante->FOTO?>" alt="imagen infante" class = "fotografia">
        <?php endif;?>

        <div class ="contenedor-campos">

            <?php if($tipoForm === 1 || $tipoForm === 2):?>
                <div class="campo input-largo">
                    <label for="imagen">Fotografía de infante</label>
                    <input name="imagen" id="imagen" class="file-input" type="file" accept="image/jpeg, image/png">
                </div>
            <?php endif;?>

            <div class="campo">
                <Label for="nombre">Nombre:</Label>
                <input name="infante[NOM_INFANTE]" id="nombre" class ="input-text" type="text" placeholder="Nombre(s) del infante" value="<?= s($infante->NOM_INFANTE)?>" <?=($tipoForm === 3)?"DISABLED":""?> >    
            </div>

            <div class="campo">
                <Label for="apellidos">Apellidos:</Label>
                <input name="infante[APELLIDOS_INFANTE]" id="apellidos" class ="input-text" type="text" placeholder="Apellidos del infante" value="<?= s($infante->APELLIDOS_INFANTE)?>" <?=($tipoForm === 3)?"DISABLED":""?>>    
            </div>
            
            <div class="campo">
                <Label for="id_brazalete">ID de brazalete:</Label>
                <input name="infante[ID_DISPOSITIVO]" id="id_brazalete" class ="input-text" type="text" placeholder="ID del brazalete del infante" value="<?= s($infante->ID_DISPOSITIVO)?>" <?=($tipoForm === 3)?"DISABLED":""?>>
            </div>
    
            <div class="campo text-restrict">
                <Label for="alergia_medicamentos">Alergias con medicamentos:</Label>
                <textarea name="infante[ALERGIA_MED]" id="alergia_medicamentos" class ="input-text text-restrict" placeholder="ingrese alergias o restricciones que tiene el infante medicamente" <?=($tipoForm === 3)?"DISABLED":""?>><?= s($infante->ALERGIA_MED)?> </textarea>    
            </div>

            <div class="campo text-restrict">
                <Label for="alergia_alimentos">Alergias con alimentos:</Label>
                <textarea name="infante[ALERGIA_ALIM]" id="alergia_alimentos" class ="input-text text-restrict" placeholder="ingrese alergias o restricciones que tiene el infante con el alimento" <?=($tipoForm === 3)?"DISABLED":""?>><?= s($infante->ALERGIA_ALIM)?></textarea>    
            </div>
        </div>

    </fieldset>

    <fieldset>
        <legend>Contacto de emergencia</legend>
        <div class ="contenedor-campos">
            <div class="campo">
                <Label for="nom_contacto">Nombre de contacto: </Label>
                <input name="infante[NOM_CONTACT_EM]" id="nom_contacto" class ="input-text" type="text" placeholder="Nombre(s) del contacto de emergencia" value="<?= s($infante->NOM_CONTACT_EM)?>" <?=($tipoForm === 3)?"DISABLED":""?>>    
            </div>

            <div class="campo">
                <Label for="tel_contacto">Telefono de contacto: </Label>
                <input name="infante[TEL_CONTACT_EM]" id="tel_contacto" class ="input-text" type="tel" placeholder="Telefono del contacto de emergencia" value="<?= s($infante->TEL_CONTACT_EM)?>" <?=($tipoForm === 3)?"DISABLED":""?>>    
            </div>

            <?php if($tipoForm === 3):?>
                <div class="campo alinear-centro">
                    <a class="btn-llamada" href="tel:+52<?= s($infante->TEL_CONTACT_EM)?>">Llamar al contacto</a>
                </div>
                
                <div class="campo alinear-centro">
                    <a class="btn-llamada" href="tel:+52911">Llamar al 911</a>
                </div>
                
            <?php endif;?>    
        </div>
    </fieldset>
    
    <?php if($tipoForm === 3):?>
        <fieldset>
            <legend>Localización</legend>
                <div id="map" style="height: 30rem;width: 100%;margin: 2rem auto;"></div>
                    <script>
                        const map = L.map('map').setView([<?= s($infante->LAT)?>,<?= s($infante->LON)?>], 20);
                        var marker = L.marker([<?= s($infante->LAT)?>,<?= s($infante->LON)?>]).addTo(map);
                        marker.bindPopup("Ubicacion de: <?=s($infante->NOM_INFANTE)?>").openPopup();
                        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);
                    </script>
                </div>
        </fieldset>
    <?php endif;?>
    
    <?php if($tipoForm === 1 || $tipoForm === 2):?>
        <div class="alinear-derecha">
            <input type="submit" value="Guardar" class="btn-verde-block" <?=($tipoForm === 3)?"DISABLED":""?>>
        </div>
    <?php endif;?>
</form>