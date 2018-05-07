<?php

class Administrador extends Controlador
{
    public $usuarioModelo;
    public $mesaModelo;
    public $programaModelo;
    public $rolModelo;

    public function __construct() {
        $this->usuarioModelo = $this->modelo('Usuario');
        $this->mesaModelo = $this->modelo('Mesa');
        $this->programaModelo = $this->modelo('Programa');
        $this->rolModelo = $this->modelo('Rol');
    }

    public function viewAdministrador() {
        Service::validarSesion();
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        $datos = [
            'usuarios' => $usuarios,
        ];
        $this->vista('home/Administrador/viewAdministrador', $datos);
    }

    public function agregarUsuario(){
        Service::validarSesion();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!isset($_POST['jurado']) || $_POST['jurado'] != "1" ){
                $jurado = "0";
            }else{
                $jurado = "1";
            }
            if(!isset($_POST['supervisor']) || $_POST['supervisor'] != "1"){
                $supervisor = "0";
            }else{
                $supervisor = "1";
            }
            if(!isset($_POST['testigo']) || $_POST['testigo'] != "1"){
                $testigo = "0";
            }else{
                $testigo = "1";
            }
            if(!isset($_POST['votante']) || $_POST['votante'] != "1"){
                $votante = "0";
            }else{
                $votante = "1";
            }
            if(!isset($_POST['administrador']) || $_POST['administrador'] != "1"){
                $administrador = "0";
            }else{
                $administrador = "1";
            }
            if(!isset($_POST['habilitado']) || $_POST['habilitado'] != "1"){
                $habilitado = "0";
            }else{
                $habilitado = "1";
            }
            $datos = [
                'id_usuario' => trim($_POST['id_usuario']),
                'nombre' => trim($_POST['nombre']),
                'apellido' => trim($_POST['apellido']),
                'estado' => $habilitado,
                'id_rol' => trim($_POST['id_rol']),
                'id_mesa' => trim($_POST['id_mesa']),
                'id_programa' => trim($_POST['id_programa']),
                'contrasenia' => trim($_POST['contrasenia']),
                'jurado' => $jurado,
                'supervisor' => $supervisor,
                'testigo' => $testigo,
                'votante' => $votante,
                'administrador' => $administrador
            ];

            if($this->rolModelo->agregarRol($datos) && $this->usuarioModelo->agregarUsuario($datos)){
                header('location: ' . RUTA_URL . '/Administrador/viewAdministrador');
            }else{
                die('Algo salió mal.');
            }

        }else{
            Service::validarSesion();
            $id_mesas = $this->mesaModelo->obtenerMesas();
            $id_programas = $this->programaModelo->obtenerProgramas();
            $datos = [
                'id_usuario' => '',
                'nombre' => 'Ricardo',
                'apellido' => '',
                'estado' => '',
                'id_rol' => '',
                'id_mesas' => $id_mesas,
                'id_programas' => $id_programas,
                'contrasenia' => '',
                'jurado' => '',
                'supervisor' => '',
                'testigo' => '',
                'votante' => '',
                'administrador' => '',
                'titulo' => 'Agregar Usuario'
            ];

            $this->vista('home/Administrador/agregarUsuario', $datos);
        }
    }

    public function editarUsuario(){
        Service::validarSesion();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!isset($_POST['jurado']) || $_POST['jurado'] != "1" ){
                $jurado = "0";
            }else{
                $jurado = "1";
            }
            if(!isset($_POST['supervisor']) || $_POST['supervisor'] != "1"){
                $supervisor = "0";
            }else{
                $supervisor = "1";
            }
            if(!isset($_POST['testigo']) || $_POST['testigo'] != "1"){
                $testigo = "0";
            }else{
                $testigo = "1";
            }
            if(!isset($_POST['votante']) || $_POST['votante'] != "1"){
                $votante = "0";
            }else{
                $votante = "1";
            }
            if(!isset($_POST['administrador']) || $_POST['administrador'] != "1"){
                $administrador = "0";
            }else{
                $administrador = "1";
            }
            if(!isset($_POST['habilitado']) || $_POST['habilitado'] != "1"){
                $habilitado = "0";
            }else{
                $habilitado = "1";
            }
            $datos = [
                'id_usuario' => trim($_POST['id_usuario']),
                'nombre' => trim($_POST['nombre']),
                'apellido' => trim($_POST['apellido']),
                'estado' => $habilitado,
                'id_rol' => trim($_POST['id_rol']),
                'id_mesa' => trim($_POST['id_mesa']),
                'id_programa' => trim($_POST['id_programa']),
                'contrasenia' => trim($_POST['contrasenia']),
                'jurado' => $jurado,
                'supervisor' => $supervisor,
                'testigo' => $testigo,
                'votante' => $votante,
                'administrador' => $administrador
            ];

            if($this->rolModelo->editarRol($datos) && $this->usuarioModelo->editarUsuario($datos)){
                header('location: ' . RUTA_URL . '/Administrador/viewAdministrador');
            }else{
                die('Algo salió mal.');
            }

        }else{
            Service::validarSesion();
            $id_mesas = $this->mesaModelo->obtenerMesas();
            $id_programas = $this->programaModelo->obtenerProgramas();
            $usuario = $this->usuarioModelo->obtenerUsuarioPorId($_GET['id_usuario']);

            if($usuario[0]->jurado == 1){
                $jurado = 'checked';
            }else{
                $jurado = '';
            }
            if($usuario[0]->supervisor == 1){
                $supervisor = 'checked';
            }else{
                $supervisor = '';
            }
            if($usuario[0]->testigo == 1){
                $testigo = 'checked';
            }else{
                $testigo = '';
            }
            if($usuario[0]->votante == 1){
                $votante = 'checked';
            }else{
                $votante = '';
            }
            if($usuario[0]->administrador == 1){
                $administrador = 'checked';
            }else{
                $administrador = '';
            }
            if($usuario[0]->estado == 1){
                $estado = 'checked';
            }else{
                $estado = '';
            }

            $datos = [
                'id_usuario' => $usuario[0]->id_usuario,
                'nombre' => $usuario[0]->nombre,
                'apellido' => $usuario[0]->apellido,
                'estado' => $estado,
                'id_rol' => $usuario[0]->id_rol,
                'id_mesas' => $id_mesas,
                'id_programas' => $id_programas,
                'id_mesa' => $usuario[0]->id_mesa,
                'id_programa' => $usuario[0]->id_programa,
                'contrasenia' => $usuario[0]->contrasenia,
                'jurado' => $jurado,
                'supervisor' => $supervisor,
                'testigo' => $testigo,
                'votante' => $votante,
                'administrador' => $administrador,
                'titulo' => 'Editar Usuario'
            ];

            $this->vista('home/Administrador/editarUsuario', $datos);
        }
    }

    public function eliminarUsuario(){
        Service::validarSesion();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id_rol = $this->usuarioModelo->obtenerUsuarioPorId($_POST['id_usuario'])[0]->id_rol;

            try{
                $this->usuarioModelo->eliminarUsuario($_POST['id_usuario']);
                $this->rolModelo->eliminarRol($id_rol);
            }catch (Exception $e){}
            finally{
                header('location: ' . RUTA_URL . '/Administrador/viewAdministrador');
            }
        }
        header('location: ' . RUTA_URL . '/Administrador/viewAdministrador');
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = $this->usuarioModelo->obtenerUsuarioPorId($_POST['id']);
            if($usuario[0]->contrasenia == $_POST['password'] && $usuario[0]->administrador == 1){
                session_start();
                $_SESSION['id_usuario'] = $usuario[0]->id_usuario;
                header('location: ' . RUTA_URL . '/Administrador/viewAdministrador');
            }
        }
        header('location: ' . RUTA_URL);
    }

    public function logOut(){
        session_destroy();
        header('location: ' . RUTA_URL);
    }
}