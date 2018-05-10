<?php require RUTA_APP . '/views/inc/header.php' ;?>

<div>
    <h3><?php echo $datos['titulo']; ?></h3>
    <br>
    <a href="<?php echo RUTA_URL; ?>/Administrador/viewAdministrador/" class="btn btn-danger">Cancelar</a>
    <form id="form" class="card" action="<?php echo RUTA_URL; ?>/Administrador/agregarUsuario" method="POST">

        <div class="form-group col-md-6">
            <h4>Usuario</h4>
            <hr>
        </div>

        <div class="form-group col-md-6">
            <label for="id_usuario">Ingresa el Id</label>
            <input class="form-control" name="id_usuario" id="id_usuario" placeholder="Id Usuario" type="number">
        </div>

        <div class="form-group col-md-6">
            <label for="nombre">Ingresa el Nombre</label>
            <input class="form-control" name="nombre" id="nombre" placeholder="Nombre" type="text">
        </div>

        <div class="form-group col-md-6">
            <label for="apellido">Ingresa el Apellido</label>
            <input class="form-control" name="apellido" id="apellido" placeholder="Apellido" type="text">
        </div>

        <div class="form-group col-md-6">
            <label>
                <input name="habilitado" type="checkbox" class="filled-in" value="1">
                <span>Habilitado</span>
            </label>
        </div>

        <div class="form-group col-md-6">
            <label for="id_mesa">Escoge la Mesa</label>
            <select class="form-control" name="id_mesa" id="id_mesa">
                <?php foreach ($datos['id_mesas'] as $mesa)  :  ?>
                    <option value="<?php echo $mesa->id_mesa; ?>"><?php echo $mesa->id_mesa; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="id_programa">Escoge el Programa</label>
            <select class="form-control" name="id_programa" id="id_programa">
                <?php foreach ($datos['id_programas'] as $programa)  :  ?>
                    <option value="<?php echo $programa->id_programa; ?>"><?php echo $programa->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="contrasenia">Ingresa la Contraseña</label>
            <input class="form-control" name="contrasenia" id="contrasenia" placeholder="Contraseña" type="password">
        </div>

        <div class="form-group col-md-6">
            <h4>Rol</h4>
            <hr>
        </div>

        <div class="form-group col-md-6">
            <label for="id_rol">Ingresa el Id Rol</label>
            <input class="form-control" name="id_rol" id="id_rol" placeholder="Id Rol" type="number">
        </div>

        <div class="form-group col-md-6">
            <label>
                <input name="jurado" type="checkbox" class="filled-in" value="1">
                <span>Jurado</span>
            </label>
        </div>

        <div class="form-group col-md-6">
            <label>
                <input name="supervisor" type="checkbox" class="filled-in" value="1">
                <span>Supervisor</span>
            </label>
        </div>

        <div class="form-group col-md-6">
            <label>
                <input name="testigo" type="checkbox" class="filled-in" value="1">
                <span>Testigo</span>
            </label>
        </div>

        <div class="form-group col-md-6">
            <label>
                <input name="votante" type="checkbox" class="filled-in" value="1">
                <span>Votante</span>
            </label>
        </div>

        <div class="form-group col-md-6">
            <label>
                <input name="administrador" type="checkbox" class="filled-in" value="1">
                <span>Administrador</span>
            </label>
        </div>

        <br>

        <div class="form-group col-md-6">
            <label>
                <input class="btn btn-success" type="submit" value="Guardar">
            </label>
        </div>
    </form>
</div>

<?php require RUTA_APP . '/views/inc/footer.php' ;?>