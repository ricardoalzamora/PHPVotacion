<?php require RUTA_APP . '/views/inc/header.php' ;?>

    <div>
        <h3><?php echo $datos['titulo']; ?></h3>
        <br>
        <a href="<?php echo RUTA_URL; ?>/Administrador/viewAdministrador/" class="btn btn-danger">Cancelar</a>
        <form name="form_candidato" id="form" class="card" action="<?php echo RUTA_URL; ?>/Administrador/editarCandidato" method="POST">

            <div>
                <input name="id_candidato" type="hidden" value="<?php echo $datos['id_candidato']; ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="numero">Número</label>
                <input class="form-control" name="numero" id="numero" placeholder="Numero" type="number" value="<?php echo $datos['numero']; ?>">
            </div>

            <br>

            <div class="form-group col-md-6">
                <label for="id_organo">Escoge el Organo</label>
                <select class="form-control" name="id_organo" id="id_organo">
                    <?php foreach ($datos['id_organos'] as $organo)  :  ?>
                        <option value="<?php echo $organo->id_organo; ?>"><?php echo $organo->id_organo; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <br>

            <div class="form-group col-md-6">
                <label>
                    <input class="btn btn-success" type="button" id="btn-submit" value="Guardar Cambios">
                </label>
            </div>
        </form>
    </div>

    <script>
        window.onload = function () {
            document.getElementById("btn-submit").onclick = validarCandidato;
        }
    </script>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>