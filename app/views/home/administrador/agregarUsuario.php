<?php require RUTA_APP . '/views/inc/header.php' ;?>

<div class="row">
    <h3 class="center">Agregar Usuario</h3>
    <br>
    <a href="<?php echo RUTA_URL; ?>/Administrador/viewAdministrador/" class="btn">Cancelar</a>
    <form class="col s12" action="<?php echo RUTA_URL; ?>/Administrador/agregarUsuario" method="POST">

        <div class="input-field col s12">
            <h4>Usuario</h4>
            <hr>
        </div>

        <div class="input-field col s2">
            <input name="id_usuario" placeholder="Id Usuario" type="number" class="validate">
        </div>

        <div class="input-field col s5">
            <input name="nombre" placeholder="Nombre" type="text" class="validate">
        </div>

        <div class="input-field col s5">
            <input name="apellido" placeholder="Apellido" type="text" class="validate">
        </div>

        <div class="input-field col s4">
            <label>
                <input name="habilitado" type="checkbox" class="filled-in" value="1">
                <span>Habilitado</span>
            </label>
        </div>

        <div class="input-field col s4">
            <label for="id_mesa">Escoge la Mesa</label>
            <select class="form-control" name="id_mesa" id="id_mesa">
                <?php foreach ($datos['id_mesas'] as $mesa)  :  ?>
                    <option value="<?php echo $mesa->id_mesa; ?>"><?php echo $mesa->id_mesa; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="input-field col s4">
            <label for="id_programa">Escoge el Programa</label>
            <select class="form-control" name="id_programa" id="id_programa">
                <?php foreach ($datos['id_programas'] as $programa)  :  ?>
                    <option value="<?php echo $programa->id_programa; ?>"><?php echo $programa->id_programa; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="input-field col s4">
            <input name="contrasenia" placeholder="Contraseña" type="password" class="validate">
        </div>

        <div class="input-field col s12">
            <h4>Rol</h4>
            <hr>
        </div>

        <div class="input-field col s4">
            <input name="id_rol" placeholder="Id Rol" type="number" class="validate">
        </div>

        <div class="input-field col s2">
            <label>
                <input name="jurado" type="checkbox" class="filled-in" value="1">
                <span>Jurado</span>
            </label>
        </div>

        <div class="input-field col s2">
            <label>
                <input name="supervisor" type="checkbox" class="filled-in" value="1">
                <span>Supervisor</span>
            </label>
        </div>

        <div class="input-field col s2">
            <label>
                <input name="testigo" type="checkbox" class="filled-in" value="1">
                <span>Testigo</span>
            </label>
        </div>

        <div class="input-field col s2">
            <label>
                <input name="votante" type="checkbox" class="filled-in" value="1">
                <span>Votante</span>
            </label>
        </div>

        <div class="input-field col s2">
            <label>
                <input name="administrador" type="checkbox" class="filled-in" value="1">
                <span>Administrador</span>
            </label>
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