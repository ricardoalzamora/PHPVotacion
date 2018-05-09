<table class="table">
    <thead>
        <tr>
            <th>Número</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Organo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($datos['candidatos'] as $candidato)  :  ?>
        <tr>
            <td><?php echo $candidato->numero; ?></td>
            <td><?php echo $candidato->nombre; ?></td>
            <td><?php echo $candidato->apellido; ?></td>
            <td><?php echo $candidato->organo_nombre; ?></td>
            <td>
                <form action="<?php echo RUTA_URL; ?>/Administrador/editarCandidato" method="GET">
                    <input type="hidden" name="id_candidato" value="<?php echo $candidato->id_candidato; ?>">
                    <input class="btn" type="submit" value="Editar">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>