<?php require RUTA_APP . '/views/inc/header.php' ;?>
    <h1>Bienvenido a tu sistema de votación</h1>
    <div>
        <a href="<?php echo RUTA_URL . '/Administrador/viewAdministrador' ?>" class="btn">Administrador</a>
    </div>
    <div>
        <a href="<?php echo RUTA_URL . '/Votante/viewVotante' ?>"class="btn">Votante</a>
    </div>

    <div class="card center">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#id_votante">Votante</a></li>
                    <li class="tab col s3"><a href="#id_administrador">Administrador</a></li>
                </ul>
            </div>
            <div id="id_votante" class="form col s12">
                <form action="<?php echo RUTA_URL; ?>/Votante/login" method="POST">
                    <input type="number" name="id" placeholder="Documento">
                    <input type="password" name="password" placeholder="Contraseña">
                    <input class="btn" type="submit" value="Iniciar Sesión">
                </form>
            </div>
            <div id="id_administrador" class="form col s12">
                <form action="<?php echo RUTA_URL; ?>/Administrador/login" method="POST">
                    <input type="number" name="id" placeholder="Documento">
                    <input type="password" name="password" placeholder="Contraseña">
                    <input class="btn" type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.tabs').tabs();
        });
    </script>
<?php require RUTA_APP . '/views/inc/footer.php' ;?>