<?php

class Votante extends Controlador {

    public $candidatoModelo;

    public function __construct() {
        $this->candidatoModelo = $this->modelo('Candidato');
    }

    public function viewVotante() {
        $candidatos = $this->candidatoModelo->obtenerCandidatos();
        $datos = [
            'candidatos' => $candidatos,
            'titulo' => 'Vota'
        ];
        $this->vista('home/votante/viewVotante', $datos);
    }
}