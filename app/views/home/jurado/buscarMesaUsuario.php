<?php require RUTA_APP . '/views/inc/header.php' ;?>
    <main>
        <h1>Sistema de busqueda de usuario</h1>
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
        </div>
        <br>
        <br>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Mesa</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($datos['usuariosMesa'] as $usuario)  :  ?>
                <tr>
                    <td><?php echo $usuario->id_usuario; ?></td>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td><?php echo $usuario->apellido; ?></td>
                    <td><?php echo $usuario->id_mesa; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>
<?php require RUTA_APP . '/views/inc/footer.php' ;?>