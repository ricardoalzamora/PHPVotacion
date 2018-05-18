<?php require RUTA_APP . '/views/inc/header.php' ;?>

    <h1>Bienvenido a tu Sistema Jurado <?php echo $datos['jurado']->nombre . " " . $datos['jurado']->apellido; ?></h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Programa</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($datos['usuarios'] as $usuario)  :  ?>
            <tr>
                <td><?php echo $usuario->id_usuario; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->apellido; ?></td>
                <td><?php echo $usuario->programa_nombre; ?></td>
                <td>
                    <?php if($usuario->estado == 0){ ?>
                        <form action="<?php echo RUTA_URL; ?>/Jurado/habilitarVotante" method="GET">
                            <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                            <input class="btn" type="submit" value="Habilitar">
                        </form>
                    <?php } ?>
                    <?php if($usuario->estado == 2){ ?>
                        <form action="<?php echo RUTA_URL; ?>/Jurado/certificadoVotante" method="GET">
                            <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                            <input class="btn" type="submit" value="Certificado">
                        </form>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>