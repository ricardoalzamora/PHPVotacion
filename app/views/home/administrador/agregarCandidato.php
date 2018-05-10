<?php require RUTA_APP . '/views/inc/header.php' ;?>

    <div>
        <h3><?php echo $datos['titulo']; ?></h3>
        <br>
        <a href="<?php echo RUTA_URL; ?>/Administrador/viewAdministrador/" class="btn btn-danger">Cancelar</a>
        <form id="form" class="card" action="<?php echo RUTA_URL; ?>/Administrador/agregarCandidato" method="POST">

            <div class="form-group col-md-6">
                <label for="id_candidato">Escoge el Candidato</label>
                <select class="form-control" name="id_candidato" id="id_candidato">
                    <?php foreach ($datos['id_usuarios'] as $usuario)  :  ?>
                        <option value="<?php echo $usuario->id_usuario; ?>"><?php echo $usuario->nombre . " " . $usuario->apellido; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="id_organo">Escoge el Organo</label>
                <select class="form-control" name="id_organo" id="id_organo">
                    <?php foreach ($datos['id_organos'] as $organo)  :  ?>
                        <option value="<?php echo $organo->id_organo; ?>"><?php echo $organo->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="numero">Número del Candidato</label>
                <input class="form-control" name="numero" id="numero" placeholder="Número">
            </div>

            <div class="form-group">
                <label for="foto">Adjuntar una Foto</label>
                <input name="foto" id="foto" placeholder="foto">
            </div>

            <br>

            <div class="form-group">
                <label>
                    <input class="btn btn-success" type="submit" value="Guardar">
                </label>
            </div>
        </form>
    </div>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>