<?php
    class Service{

        public function __construct()
        {
        }

        public static function validarSesion(){
            if(!isset($_SESSION)){
                session_start();
            }
            if(!isset($_SESSION['id_usuario'])){
                header('location: ' . RUTA_URL );
            }
        }
    }