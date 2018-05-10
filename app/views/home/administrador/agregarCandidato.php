<?php require RUTA_APP . '/views/inc/header.php' ;?>

    <div class="row">
        <h3 class="center"><?php echo $datos['titulo']; ?></h3>
        <br>
        <a href="<?php echo RUTA_URL; ?>/Administrador/viewAdministrador/" class="btn">Cancelar</a>
        <form class="col s12" action="<?php echo RUTA_URL; ?>/Administrador/agregarCandidato" method="POST">

            <div class="input-field col s12">
                <h4>Candidato</h4>
                <hr>
            </div>

            <div class="input-field col s4">
                <label for="id_candidato">Escoge el Candidato</label>
                <select class="form-control" name="id_candidato" id="id_candidato">
                    <?php foreach ($datos['id_usuarios'] as $usuario)  :  ?>
                        <option value="<?php echo $usuario->id_usuario; ?>"><?php echo $usuario->id_usuario; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="input-field col s5">
                <input name="foto" placeholder="foto" class="validate">
            </div>

            <div class="input-field col s5">
                <input name="numero" placeholder="Número" class="validate">
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
                    <input class="btn" type="submit" value="Guardar">
                </label>
            </div>
        </form>
    </div>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>