<?php

	class Home extends Controlador {

		public $usuarioModelo;

		public function __construct() {
			$this->usuarioModelo = $this->modelo('Usuario');
		}

		public function index() {
			$usuarios = $this->usuarioModelo->obtenerUsuarios();
			$datos = [
				'usuarios' => $usuarios,
                'titulo' => 'Administrador'
			];
			$this->vista('home/index', $datos);
		}

	}