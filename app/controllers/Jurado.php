<?php

class Jurado extends Controlador{

    private $usuarioModelo;

    public function __construct(){
        $this->usuarioModelo = $this->modelo('Usuario');
    }

    public function  viewJurado(){
        Service::validarSesion();
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        $jurado = $this->usuarioModelo->obtenerUsuarioPorId($_SESSION['id_usuario']);
        $datos = [
            'usuarios' => $usuarios,
            'jurado' => $jurado[0],
            'titulo' => 'Jurado'
        ];
        $this->vista('home/Jurado/viewJurado', $datos);
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = $this->usuarioModelo->obtenerUsuarioPorId($_POST['id']);
            if($usuario[0]->contrasenia == $_POST['password'] && $usuario[0]->jurado == 1){
                session_start();
                $_SESSION['id_usuario'] = $usuario[0]->id_usuario;
                header('location: ' . RUTA_URL . '/Jurado/viewJurado');
                return;
            }
        }
        header('location: ' . RUTA_URL);
    }
}