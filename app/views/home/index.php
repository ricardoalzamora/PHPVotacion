<?php require RUTA_APP . '/views/inc/header.php' ;?>

    <h1>Bienvenido a tu sistema de votación</h1>
    <div>
        <a href="<?php echo RUTA_URL . '/Administrador/viewAdministrador' ?>" class="btn">Administrador</a>
    </div>
    <div>
        <a href="<?php echo RUTA_URL . '/Votante/viewVotante' ?>"class="btn">Votante</a>
    </div>

    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#id_votante" role="tab" aria-controls="id_votante" aria-selected="true">Lista de Usuarios</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#id_administrador" role="tab" aria-controls="id_administrador" aria-selected="false">Lista de Candidatos</a>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="id_votante" role="tabpanel" aria-labelledby="nav-home-tab">
            <form action="<?php echo RUTA_URL; ?>/Votante/login" method="POST">
                <input type="number" name="id" placeholder="Documento">
                <input type="password" name="password" placeholder="Contraseña">
                <input class="btn" type="submit" value="Iniciar Sesión">
            </form>
        </div>
        <div class="tab-pane fade" id="id_administrador" role="tabpanel" aria-labelledby="nav-profile-tab">
            <form action="<?php echo RUTA_URL; ?>/Administrador/login" method="POST">
                <input type="number" name="id" placeholder="Documento">
                <input type="password" name="password" placeholder="Contraseña">
                <input class="btn" type="submit" value="Iniciar Sesión">
            </form>
        </div>
    </div>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>