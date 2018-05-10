<?php require RUTA_APP . '/views/inc/header.php' ;?>
    <nav class="nav justify-content-end">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/Administrador/agregarUsuario/">Agregar usuario</a>
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/Administrador/agregarCandidato/">Agregar candidato</a>
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/Administrador/logOut/">Cerrar Sesión</a>
    </nav>

    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#div-listUsuarios" role="tab" aria-controls="div-listUsuarios" aria-selected="true">Lista de Usuarios</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#div-listCandidatos" role="tab" aria-controls="div-listCandidatos" aria-selected="false">Lista de Candidatos</a>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="div-listUsuarios" role="tabpanel" aria-labelledby="nav-home-tab">
            <?php require RUTA_APP . '/views/home/administrador/listViewUsuarios.php' ;?>
        </div>
        <div class="tab-pane fade" id="div-listCandidatos" role="tabpanel" aria-labelledby="nav-profile-tab">
            <?php require RUTA_APP . '/views/home/administrador/listViewCandidatos.php' ;?>
        </div>
    </div>
<?php require RUTA_APP . '/views/inc/footer.php' ;?>