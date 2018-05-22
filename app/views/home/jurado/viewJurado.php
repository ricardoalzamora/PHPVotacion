<?php require RUTA_APP . '/views/inc/header.php' ;?>
<main>
    <h1>Bienvenido a tu Sistema Jurado <?php echo $datos['jurado']->nombre . " " . $datos['jurado']->apellido; ?></h1>
    <br>
    <br>
    <div class="div-nav">
        <div class="div-form-busqueda">
            <form class="form-row" action="<?php echo RUTA_URL; ?>/Jurado/viewJurado" method="POST">
                <input class="form-control col-md-6" type="text" <?php if(isset($_POST['busquedaUsuario'])){ echo 'value="' . $_POST['busquedaUsuario'] . '"';} ?> placeholder="Buscar por Documento" name="busquedaUsuario" id="busquedaUsuario">
                <input class="btn btn-success" type="submit" value="Buscar">
                <a class="btn btn-primary" href="<?php echo RUTA_URL; ?>/Jurado/viewJurado">Limpiar</a>
            </form>
        </div>
        <div class="div-alternative">
            <a class="btn btn-secondary" target="_blank" href="<?php echo RUTA_URL; ?>/Jurado/buscarMesaUsuario">Buscar Mesa de Usuario</a>
            <a class="btn btn-danger" href="<?php echo RUTA_URL; ?>/Jurado/login">Salir</a>
        </div>
    </div>
    <br>
    <br>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Programa</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($datos['usuariosMesa'] as $usuario)  :  ?>
            <tr <?php if($usuario->estado == 1){?> class="table-primary" <?php } ?>>
                <td><?php echo $usuario->id_usuario; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->apellido; ?></td>
                <td><?php echo $usuario->programa_nombre; ?></td>
                <td>
                    <?php if($usuario->estado == 0 && getdate()['hours'] > 8 && getdate()['hours'] < 16){ ?>
                        <form action="<?php echo RUTA_URL; ?>/Jurado/habilitarVotante" method="POST">
                            <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                            <input class="btn btn-primary" type="submit" value="Habilitar">
                        </form>
                    <?php } ?>
                    <?php if($usuario->estado == 1){ ?>
                        <p>Votando</p>
                    <?php } ?>
                    <?php if($usuario->estado == 2){ ?>
                        <form action="<?php echo RUTA_URL; ?>/Jurado/certificadoVotante" method="POST">
                            <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                            <input class="btn btn-success" type="submit" value="Certificado">
                        </form>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php require RUTA_APP . '/views/inc/footer.php' ;?>