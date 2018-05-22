<?php

	class Home extends Controlador {

		public $usuarioModelo;
		public $votoModelo;

		public function __construct() {
			$this->usuarioModelo = $this->modelo('Usuario');
			$this->votoModelo = $this->modelo('Voto');
		}

		public function index() {
		    session_start();
            session_destroy();
			$usuarios = $this->usuarioModelo->obtenerUsuarios();
			$datos = [
				'usuarios' => $usuarios,
                'titulo' => 'Sistema de Votación'
			];
			$this->vista('home/index', $datos);
		}

		public function estadistica(){
            $votos = $this->votoModelo->obtenerVotos();
            $votosBlancos = $this->votoModelo->obtenerVotosBlancos();
            $datos = [
                'votos' => $votos,
                'votosBlancos' => $votosBlancos,
                'titulo' => 'Estadística'
            ];
            $this->vista('home/estadistica', $datos);
        }

	}