<?php

class Votante extends Controlador {

    public $candidatoModelo;
    public $usuarioModelo;
    public $votoModelo;
    public $mesaModelo;

    public function __construct() {
        $this->candidatoModelo = $this->modelo('Candidato');
        $this->usuarioModelo = $this->modelo('Usuario');
        $this->votoModelo  = $this->modelo('Voto');
        $this->mesaModelo = $this->modelo('Mesa');
    }

    public function viewVotante() {
        Service::validarSesion();
        $candidatos = $this->candidatoModelo->obtenerCandidatos();
        $votante = $this->usuarioModelo->obtenerUsuarioPorId($_SESSION['id_usuario']);
        $datos = [
            'candidatos' => $candidatos,
            'votante' => $votante[0],
            'titulo' => 'Vota'
        ];
        $this->vista('home/Votante/viewVotante', $datos);
    }

    public function votar(){
        Service::validarSesion();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $votante = $this->usuarioModelo->obtenerUsuarioPorId($_SESSION['id_usuario']);
            foreach ($votante as $mesa)  :

            for($i = 1; $i < 5; $i++){
                $datos = [
                    'id_candidato' => $_POST[$i],
                    'mesa' => $mesa->id_mesa
                ];
                if(!$this->votoModelo->agregarVoto($datos)){
                    die('Algo salió mal.');
                }
            }
            endforeach;
            $this->usuarioModelo->votoUsuario($_SESSION['id_usuario']);
            $this->certificado();
        }
    }

    public function certificado(){
        Service::validarSesion();
        $votante = $this->usuarioModelo->obtenerUsuarioPorId($_SESSION['id_usuario']);
        Service::certificado($votante);
        $datos = [
            'votante' => $votante[0],
            'titulo' => 'Certificado'
        ];
        $this->vista('home/Votante/certificado', $datos);
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = $this->usuarioModelo->obtenerUsuarioPorId($_POST['id']);
            $mesa = $this->mesaModelo->obtenerMesaPorId($usuario[0]->id_mesa);
            date_default_timezone_set('America/Bogota');
            if($usuario[0]->contrasenia == $_POST['password'] && $usuario[0]->votante == 1 && $usuario[0]->estado == 1 && getdate()['hours'] > 8 && getdate()['hours'] < 16){
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