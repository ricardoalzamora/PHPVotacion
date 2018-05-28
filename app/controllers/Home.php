<?php

	class Home extends Controlador {

		public $usuarioModelo;
		public $votoModelo;
		public $mesaModelo;

		public function __construct() {
			$this->usuarioModelo = $this->modelo('Usuario');
			$this->votoModelo = $this->modelo('Voto');
			$this->mesaModelo = $this->modelo('Mesa');
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

        public function resultadosMesa(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_mesas = $this->mesaModelo->obtenerMesas();
                $votos = $this->votoModelo->obtenerVotosMesa($_POST['id_mesa']);
                $cantidadVotosMesa = $this->votoModelo->cantidadVotosMesa($_POST['id_mesa']);
                $cantidadVotosBlancosMesa = $this->votoModelo->cantidadVotosBlancosMesa($_POST['id_mesa']);
                $votosBlancos = $this->votoModelo->obtenerVotosBlancosMesa($_POST['id_mesa']);
                $datos = [
                    'votos' => $votos,
                    'votosBlancos' => $votosBlancos,
                    'cantidadVotosMesa' => $cantidadVotosMesa,
                    'cantidadVotosBlancosMesa' => $cantidadVotosBlancosMesa,
                    'id_mesas' => $id_mesas,
                    'titulo' => 'Resultado por Usuario'
                ];
            }else{
                $id_mesas = $this->mesaModelo->obtenerMesas();
                $datos = [
                    'id_mesas' => $id_mesas,
                    'titulo' => 'Resultado por Usuario'
                ];

            }
            $this->vista('home/resultadosMesa', $datos);
        }

	}