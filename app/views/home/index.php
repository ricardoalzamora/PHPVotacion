<?php require RUTA_APP . '/views/inc/header.php' ;?>
    <h1>Bienvenido a tu sistema de votación</h1>
    <div>
        <a href="<?php echo RUTA_URL . '/Administrador/viewAdministrador' ?>">Administrador</a>
    </div>
    <div>
        <a href="<?php echo RUTA_URL . '/Votante/viewVotante' ?>">Votante</a>
    </div>

    <div class="card center">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#id_votante">Votante</a></li>
                    <li class="tab col s3"><a href="#id_administrador">Administrador</a></li>
                </ul>
            </div>
            <div id="id_votante" class="col s12">Votante</div>
            <div id="id_administrador" class="col s12">Administrador</div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.tabs').tabs();
        });
    </script>
<?php require RUTA_APP . '/views/inc/footer.php' ;?>