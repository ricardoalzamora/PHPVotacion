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
                <form action="<?php echo RUTA_URL; ?>/Administrador/editarUsuario" method="GET">
                    <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                    <input class="btn" type="submit" value="Editar">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>