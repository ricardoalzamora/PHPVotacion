<?php

	class Home extends Controlador {

		public $usuarioModelo;

		public function __construct() {
			$this->usuarioModelo = $this->modelo('Usuario');
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

	}