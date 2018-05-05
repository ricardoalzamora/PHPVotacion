<?php

class Administrador extends Controlador
{
    public $usuarioModelo;

    public function __construct() {
        $this->usuarioModelo = $this->modelo('Usuario');
    }

    public function viewAdministrador() {
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        $datos = [
            'usuarios' => $usuarios,
        ];
        $this->vista('home/administrador/viewAdministrador', $datos);
    }
}