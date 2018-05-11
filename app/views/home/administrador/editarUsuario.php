<?php require RUTA_APP . '/views/inc/header.php' ;?>

    <div>
        <h3><?php echo $datos['titulo']; ?></h3>
        <br>
        <a href="<?php echo RUTA_URL; ?>/Administrador/viewAdministrador" class="btn btn-danger">Cancelar</a>
        <form name="form_usuario" id="form" class="card" action="<?php echo RUTA_URL; ?>/Administrador/editarUsuario" method="POST">

            <div class="form-group col-md-6">
                <h4>Usuario</h4>
                <hr>
            </div>

            <div class="form-group col-md-6">
                <input name="id_usuario" id="id_usuario" type="hidden" value="<?php echo $datos['id_usuario']; ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="nombre">Nombre</label>
                <input class="form-control" name="nombre" id="nombre" placeholder="Nombre" type="text" value="<?php echo $datos['nombre']; ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="apellido">Apellido</label>
                <input class="form-control" name="apellido" id="apellido" placeholder="Apellido" type="text" value="<?php echo $datos['apellido']; ?>">
            </div>

            <div class="form-group col-md-6">
                <label>
                    <input name="habilitado" type="checkbox" <?php echo $datos['estado']; ?> class="filled-in" value="1">
                    <span>Habilitado</span>
                </label>
            </div>

            <div class="form-group col-md-6">
                <label for="id_mesa">Mesa</label>
                <select class="form-control" name="id_mesa" id="id_mesa">
                    <?php foreach ($datos['id_mesas'] as $mesa)  :  ?>
                        <option value="<?php echo $mesa->id_mesa; ?>"><?php echo $mesa->id_mesa; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="id_programa">Programa</label>
                <select class="form-control" name="id_programa" id="id_programa">
                    <?php foreach ($datos['id_programas'] as $programa)  :  ?>
                        <option value="<?php echo $programa->id_programa; ?>"><?php echo $programa->id_programa; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="contrasenia">Contraseña</label>
                <input class="form-control" name="contrasenia" id="contrasenia" placeholder="Contraseña" type="password" value="<?php echo $datos['contrasenia']; ?>">
            </div>

            <div class="form-group col-md-6">
                <h4>Rol</h4>
                <hr>
            </div>

            <div class="form-group col-md-6">
                <input name="id_rol" id="id_rol" type="hidden" value="<?php echo $datos['id_rol']; ?>">
            </div>

            <div class="form-group col-md-6">
                <label>
                    <input name="jurado" type="checkbox" class="filled-in" <?php echo $datos['jurado']; ?> value="1">
                    <span>Jurado</span>
                </label>
            </div>

            <div class="form-group col-md-6">
                <label>
                    <input name="supervisor" type="checkbox" class="filled-in" <?php echo $datos['supervisor']; ?> value="1">
                    <span>Supervisor</span>
                </label>
            </div>

            <div class="form-group col-md-6">
                <label>
                    <input name="testigo" type="checkbox" class="filled-in" <?php echo $datos['testigo']; ?> value="1">
                    <span>Testigo</span>
                </label>
            </div>

            <div class="form-group col-md-6">
                <label>
                    <input name="votante" type="checkbox" class="filled-in" <?php echo $datos['votante']; ?> value="1">
                    <span>Votante</span>
                </label>
            </div>

            <div class="form-group col-md-6">
                <label>
                    <input name="administrador" type="checkbox" class="filled-in" <?php echo $datos['administrador']; ?> value="1">
                    <span>Administrador</span>
                </label>
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
            document.getElementById("btn-submit").onclick = validarUsuario;
        }
    </script>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>