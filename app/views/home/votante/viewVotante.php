<?php require RUTA_APP . '/views/inc/header.php' ;?>
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