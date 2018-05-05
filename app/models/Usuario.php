<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }


    public  function  obtenerUsuarios(){
        $this->db->query('SELECT id_usuario, usuarios.nombre, usuarios.apellido, programas.nombre as programa_nombre FROM usuarios JOIN programas ON usuarios.id_programa = programas.id_programa');
        return $this->db->registros();
    }
}