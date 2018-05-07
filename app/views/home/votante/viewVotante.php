<?php require RUTA_APP . '/views/inc/header.php' ;?>
    <a href="<?php echo RUTA_URL; ?>/Votante/logOut/" class="btn">Cancelar</a>
    <div>
        <form action="">
            <?php for($i = 1; $i < 5; $i++){
                foreach ($datos['candidatos'] as $canditato)  :
                    if($canditato->id_organo == $i){ ?>
                        <div>
                            <h3><?php echo $canditato->nombre . " " . $canditato->apellido ?></h3>
                            <img src="<?php echo $canditato->foto; ?>" alt="<?php echo $canditato->nombre; ?>">
                        </div>
                        <hr>
            <?php }
            endforeach;
            } ?>
        </form>
    </div>
<?php require RUTA_APP . '/views/inc/footer.php' ;?>