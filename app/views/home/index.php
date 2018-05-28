<?php require RUTA_APP . '/views/inc/header.php' ;?>
    <div class="header">
        <div class="content1">
            <img src="<?php echo RUTA_URL; ?>/public/img/ico/escudo.png" class="log">
            <h2 class="title">UNIMAGDALENA</h2>
        </div>
    </div>
    <h1>Bienvenido a tu sistema de votación</h1>

    <?php if(getdate()['hours'] >= 16){ ?>
        <br>
        <div id="look">
            <h3>Revisa los Resultados Electorales.</h3>
            <a class="btn btn-primary" href="<?php echo RUTA_URL; ?>/Home/estadistica" target="_blank">Consultar</a>
            <a class="btn btn-primary" href="<?php echo RUTA_URL; ?>/Home/resultadosMesa" target="_blank">Consultal Mesa</a>
        </div>
    <?php } ?>

    <div class="principal">
        <div class="centro">
            <div class="first">
                <h4>LOGIN VOTACIONES</h4>
            </div>
            <div class="form-group col-md-6" id="login_div">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#id_votante" role="tab" aria-controls="id_votante" aria-selected="true">Votante</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#id_administrador" role="tab" aria-controls="id_administrador" aria-selected="false">Administrador</a>
                    <a class="nav-item nav-link" id="nav-jurado-tab" data-toggle="tab" href="#id_jurado" role="tab" aria-controls="id_jurado" aria-selected="false">Jurado</a>
                </div>
                <br>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active second" id="id_votante" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form name="form_login_1" action="<?php echo RUTA_URL; ?>/Votante/login" method="POST">
                            <input class="form-control" type="number" name="id" id="id_1" placeholder="Documento">
                            <br>
                            <input class="form-control" type="password" name="password" id="password_1" placeholder="Contraseña">
                            <br>
                            <input class="btn btn-success" type="button" id="btn-submit-1" value="Iniciar Sesión">
                        </form>
                    </div>
                    <div class="tab-pane fade second" id="id_administrador" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form name="form_login_2" action="<?php echo RUTA_URL; ?>/Administrador/login" method="POST">
                            <input class="form-control" type="number" name="id" id="id_2" placeholder="Documento">
                            <br>
                            <input class="form-control" type="password" name="password" id="password_2" placeholder="Contraseña">
                            <br>
                            <input class="btn btn-success" type="button" id="btn-submit-2" value="Iniciar Sesión">
                        </form>
                    </div>
                    <div class="tab-pane fade second" id="id_jurado" role="tabpanel" aria-labelledby="nav-jurado-tab">
                        <form name="form_login_3" action="<?php echo RUTA_URL; ?>/Jurado/login" method="POST">
                            <input class="form-control" type="number" name="id" id="id_3" placeholder="Documento">
                            <br>
                            <input class="form-control" type="password" name="password" id="password_3" placeholder="Contraseña">
                            <br>
                            <input class="btn btn-success" type="button" id="btn-submit-3" value="Iniciar Sesión">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        window.onload = function () {
            document.getElementById("btn-submit-1").onclick = validarLogin1;
            document.getElementById("btn-submit-2").onclick = validarLogin2;
            document.getElementById("btn-submit-3").onclick = validarLogin3;
        }
    </script>

    <footer>
        <div class="contenedor">
            <div class="un">
                <p class="texto">
                    Carrera 32 No 22-08 Sector San Pedro Alejandrino
                    <br> Código Postal N° 470004
                    <br> PBX: (57 - 5)4217940 EXT. 3221, 3139 y 3117
                    <br>
                    <a href="#">admisiones@unimagdalena.edu.co</a>
                    <br> Santa Marta D.T.C.H. - Colombia
                    <br> Universidad del Magdalena ©
                    <br> 2018
                </p>
            </div>

        </div>

    </footer>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>