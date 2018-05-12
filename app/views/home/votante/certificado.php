<?php require RUTA_APP . '/views/inc/header.php' ;?>

<div class="card div-certificado">
    <h2>Certificado de votación</h2>
    <h3><?php echo $datos['votante']->nombre . " " . $datos['votante']->apellido; ?></h3>
    <p>Votó el día <?php echo date("d/m/y"); ?></p>
    <p>A las <?php echo date("H:i:s"); ?> </p>
</div>

    <a class="btn btn-primary" href="<?php echo RUTA_URL; ?>/Votante/logOut/">Salir</a>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>