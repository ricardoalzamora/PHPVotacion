<?php require RUTA_APP . '/views/inc/header.php' ;?>
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
                <td><a href="<?php echo RUTA_URL; ?>pages/editar/<?php echo $usuario->id_usuario; ?>">Editar</a></td>
                <td><a href="<?php echo RUTA_URL; ?>pages/borrar/<?php echo $usuario->id_usuario; ?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php require RUTA_APP . '/views/inc/footer.php' ;?>