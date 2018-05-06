<?php

class Rol
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function agregarRol($datos){
        $this->db->query("INSERT INTO rol (id_rol, jurado, supervisor, testigo, votante, administrador) VALUES (:id_rol, :jurado, :supervisor, :testigo, :votante, :administrador)");
        $this->db->bind(':id_rol', $datos['id_rol']);
        $this->db->bind(':jurado', $datos['jurado']);
        $this->db->bind(':supervisor', $datos['supervisor']);
        $this->db->bind(':testigo', $datos['testigo']);
        $this->db->bind(':votante', $datos['votante']);
        $this->db->bind(':administrador', $datos['administrador']);
        return $this->db->execute();
    }
}

















