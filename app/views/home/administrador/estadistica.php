<?php require RUTA_APP . '/views/inc/header.php' ;?>
    <nav class="nav justify-content-end">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/Administrador/viewAdministrador">Regresar</a>
    </nav>
    <h1>VOTOS</h1>
    <?php for($i = 1; $i < 5; $i++){ ?>
    <div class="entity-master card">
        <?php foreach ($datos['votos'] as $voto)  : if($voto->id_organo == $i){ ?>
            <h3><?php echo $voto->nombre_organo; ?></h3>
            <div class="entity card">
                <p><?php echo $voto->nombre_candidato . " " . $voto->apellido_candidato; ?></p>
                <p>Número de voto: <?php echo $voto->cantidad?></p>
            </div>
        <?php } endforeach; ?>
    </div>
    <?php } ?>


<?php require RUTA_APP . '/views/inc/footer.php' ;?>