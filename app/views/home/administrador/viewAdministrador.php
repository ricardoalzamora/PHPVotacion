<?php require RUTA_APP . '/views/inc/header.php' ;?>
    <nav class="center">
        <a href="<?php echo RUTA_URL; ?>/Administrador/agregarUsuario/" class="btn">Agregar usuario</a>
        <a href="<?php echo RUTA_URL; ?>/Administrador/logOut/" class="btn">Cerrar Sesión</a>
    </nav>

    <table class="table">
        <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Porgrama</th>
        <th>Acciones</th>
        </thead>
        <tbody>
        <?php foreach ($datos['usuarios'] as $usuario)  :  ?>
            <tr>
                <td><?php echo $usuario->id_usuario; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->apellido; ?></td>
                <td><?php echo $usuario->programa_nombre; ?></td>
                <td>
                    <form action="<?php echo RUTA_URL; ?>/Administrador/editarUsuario/" method="get">
                        <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                        <input class="btn" type="submit" value="Editar">
                    </form>
                </td>
                <td>
                    <form action="<?php echo RUTA_URL; ?>/Administrador/eliminarUsuario/" method="get">
                        <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                        <input class="btn" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php require RUTA_APP . '/views/inc/footer.php' ;?>