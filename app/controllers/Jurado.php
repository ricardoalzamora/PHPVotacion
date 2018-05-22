<?php

class Jurado extends Controlador{

    private $usuarioModelo;
    private $juradoModelo;

    public function __construct(){
        $this->usuarioModelo = $this->modelo('Usuario');
        $this->juradoModelo = $this->modelo('JuradoModel');
    }

    public function  viewJurado(){
        Service::validarSesion();
        $jurado = $this->usuarioModelo->obtenerUsuarioPorId($_SESSION['id_usuario']);

        if(isset($_POST['busquedaUsuario'])){
            $usuariosDeLaMesa = $this->usuarioModelo->obtenerUsuarioPorMesaConsulta($jurado[0]->id_mesa, $_POST['busquedaUsuario']);
        }else{
            $usuariosDeLaMesa = $this->usuarioModelo->obtenerUsuarioPorMesa($jurado[0]->id_mesa);
        }
        $datos = [
            'usuariosMesa' => $usuariosDeLaMesa,
            'jurado' => $jurado[0],
            'titulo' => 'Jurado'
        ];
        $this->vista('home/Jurado/viewJurado', $datos);
    }

    public function buscarMesaUsuario(){
        Service::validarSesion();
        $jurado = $this->usuarioModelo->obtenerUsuarioPorId($_SESSION['id_usuario']);
        if(isset($_POST['busquedaUsuario'])){
            $usuariosDeLaMesa = $this->usuarioModelo->obtenerMesaUsuario($_POST['busquedaUsuario']);
        }else{
            $usuariosDeLaMesa = $this->usuarioModelo->obtenerUsuarios();
        }
        $datos = [
            'usuariosMesa' => $usuariosDeLaMesa,
            'jurado' => $jurado[0],
            'titulo' => 'Buscar Sitio'
        ];
        $this->vista('home/Jurado/buscarMesaUsuario', $datos);
    }

    public function habilitarVotante(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->usuarioModelo->habilitarUsuario($_POST['id_usuario']);
        }
        header('location: ' . RUTA_URL . "/Jurado/viewJurado");
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = $this->usuarioModelo->obtenerUsuarioPorId($_POST['id']);
            if($usuario[0]->contrasenia == $_POST['password'] && $usuario[0]->jurado == 1 /*&& getdate()['hours'] > 7*/){
                session_start();
                $_SESSION['id_usuario'] = $usuario[0]->id_usuario;
                $datos=[
                    'id_jurado' => $usuario[0]->id_usuario,
                    'id_mesa' => $usuario[0]->id_mesa
                ];
                $this->juradoModelo->registrarJurado($datos);
                header('location: ' . RUTA_URL . '/Jurado/viewJurado');
                return;
            }
        }
        header('location: ' . RUTA_URL);
    }
}