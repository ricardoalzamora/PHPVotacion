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
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        $datos = [
            'usuarios' => $usuarios,
        ];
        $this->vista('home/Administrador/viewAdministrador', $datos);
    }

    public function agregarUsuario(){
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
                'id_candidato' => '',
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
}