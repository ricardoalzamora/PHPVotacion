<?php require RUTA_APP . '/views/inc/header.php' ;?>
    <h1>Bienvenido a tu sistema de votación <?php echo $datos['votante']->nombre . " " . $datos['votante']->apellido; ?></h1>
    <a href="<?php echo RUTA_URL; ?>/Votante/logOut/" class="btn btn-danger">Cancelar</a>
    <form id="form" action="<?php echo RUTA_URL; ?>/Votante/votar" method="post">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-academico-tab" data-toggle="tab" href="#div-listAcademico" role="tab" aria-controls="div-listAcademico" aria-selected="true">Académico</a>
        <a class="nav-item nav-link" id="nav-superior-tab" data-toggle="tab" href="#div-listSuperior" role="tab" aria-controls="div-listSuperior" aria-selected="false">Superior</a>
        <a class="nav-item nav-link" id="nav-bienestar-tab" data-toggle="tab" href="#div-listBienestar" role="tab" aria-controls="div-listBienestar" aria-selected="false">Bienestar</a>
        <a class="nav-item nav-link" id="nav-edgresados-tab" data-toggle="tab" href="#div-listEdgresados" role="tab" aria-controls="div-listEdgresados" aria-selected="false">Egresados</a>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="div-listAcademico" role="tabpanel" aria-labelledby="nav-academico-tab">
            <?php foreach ($datos['candidatos'] as $canditato)  :
                if($canditato->id_organo == 1){?>
                    <input type="radio" id="<?php echo $canditato->id_candidato; ?>"
                           name="1" value="<?php echo $canditato->id_candidato; ?>" required>
                    <label for="<?php echo $canditato->id_candidato; ?>">
                        <h3><?php echo $canditato->nombre; ?></h3>
                        <img class="candidato" src="<?php echo RUTA_URL . '/public/img/candidatos/' . $canditato->foto; ?>">
                    </label>
            <?php } endforeach;?>
            <input type="radio" id="1blanco" name="1" value="1blanco" required>
            <label for="1blanco">
                <div class="div_blanco">
                    <h3>Voto en Blanco</h3>
                </div>
            </label>
        </div>
        <div class="tab-pane fade" id="div-listSuperior" role="tabpanel" aria-labelledby="nav-superior-tab">
            <?php foreach ($datos['candidatos'] as $canditato)  :
                if($canditato->id_organo == 2){?>
                    <input type="radio" id="<?php echo $canditato->id_candidato; ?>"
                           name="2" value="<?php echo $canditato->id_candidato; ?>" required>
                    <label for="<?php echo $canditato->id_candidato; ?>">
                        <h3><?php echo $canditato->nombre; ?></h3>
                        <img class="candidato" src="<?php echo RUTA_URL . '/public/img/candidatos/' . $canditato->foto; ?>">
                    </label>
                <?php } endforeach;?>
            <input type="radio" id="2blanco" name="2" value="2blanco" required>
            <label for="2blanco">
                <div class="div_blanco">
                    <h3>Voto en Blanco</h3>
                </div>
            </label>
        </div>
        <div class="tab-pane fade" id="div-listBienestar" role="tabpanel" aria-labelledby="nav-bienestar-tab">
            <?php foreach ($datos['candidatos'] as $canditato)  :
                if($canditato->id_organo == 3){?>
                    <input type="radio" id="<?php echo $canditato->id_candidato; ?>"
                           name="3" value="<?php echo $canditato->id_candidato; ?>" required>
                    <label for="<?php echo $canditato->id_candidato; ?>">
                        <h3><?php echo $canditato->nombre; ?></h3>
                        <img class="candidato" src="<?php echo RUTA_URL . '/public/img/candidatos/' . $canditato->foto; ?>">
                    </label>
                <?php } endforeach;?>
            <input type="radio" id="3blanco" name="3" value="3blanco" required>
            <label for="3blanco">
                <div class="div_blanco">
                    <h3>Voto en Blanco</h3>
                </div>
            </label>
        </div>
        <div class="tab-pane fade" id="div-listEdgresados" role="tabpanel" aria-labelledby="nav-edgresados-tab">
            <?php foreach ($datos['candidatos'] as $canditato)  :
                if($canditato->id_organo == 4){?>
                    <input type="radio" id="<?php echo $canditato->id_candidato; ?>"
                           name="4" value="<?php echo $canditato->id_candidato; ?>" required>
                    <label for="<?php echo $canditato->id_candidato; ?>">
                        <h3><?php echo $canditato->nombre; ?></h3>
                        <img class="candidato" src="<?php echo RUTA_URL . '/public/img/candidatos/' . $canditato->foto; ?>">
                    </label>
                <?php } endforeach;?>
            <input type="radio" id="4blanco" name="4" value="4blanco" required>
            <label for="4blanco">
                <div class="div_blanco">
                    <h3>Voto en Blanco</h3>
                </div>
            </label>
        </div>
        <input class="btn btn-success" type="submit" value="Votar">
    </div>
    </form>
<?php require RUTA_APP . '/views/inc/footer.php' ;?>