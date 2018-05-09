<?php

class Votante extends Controlador {

    public $candidatoModelo;
    public $usuarioModelo;

    public function __construct() {
        $this->candidatoModelo = $this->modelo('Candidato');
        $this->usuarioModelo = $this->modelo('Usuario');
    }

    public function viewVotante() {
        session_start();
        if(!isset($_SESSION['id_usuario'])){
            header('location: ' . RUTA_URL );
            return;
        }
        $candidatos = $this->candidatoModelo->obtenerCandidatos();
        $datos = [
            'candidatos' => $candidatos,
            'titulo' => 'Vota'
        ];
        $this->vista('home/votante/viewVotante', $datos);
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = $this->usuarioModelo->obtenerUsuarioPorId($_POST['id']);
            if($usuario[0]->contrasenia == $_POST['password'] && $usuario[0]->votante == 1){
                session_start();
                $_SESSION['id_usuario'] = $usuario[0]->id_usuario;
                header('location: ' . RUTA_URL . '/Votante/viewVotante');
                return;
            }
        }
        header('location: ' . RUTA_URL);
    }

    public function logOut(){
        session_destroy();
        header('location: ' . RUTA_URL);
    }
}