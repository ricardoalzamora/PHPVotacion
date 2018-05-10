<?php require RUTA_APP . '/views/inc/header.php' ;?>

    <div class="row">
        <h3 class="center">Editar Candidato</h3>
        <br>
        <form class="col s12" action="<?php echo RUTA_URL; ?>/Administrador/editarCandidato" method="POST">

            <div class="input-field col s2">
                <input name="id_candidato" type="hidden" value="<?php echo $datos['id_candidato']; ?>" class="validate">
            </div>

            <div class="input-field col s5">
                <input name="numero" placeholder="Numero" type="text" value="<?php echo $datos['numero']; ?>" class="validate">
            </div>

            <div class="input-field col s4">
                <label for="id_organo">Escoge el Organo</label>
                <select class="form-control" name="id_organo" id="id_organo">
                    <?php foreach ($datos['id_organos'] as $organo)  :  ?>
                        <option value="<?php echo $organo->id_organo; ?>"><?php echo $organo->id_organo; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <br>

            <div class="input-field col s12">
                <label>
                    <input class="btn" type="submit" value="Guardar Cambios">
                </label>
            </div>
        </form>
    </div>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>