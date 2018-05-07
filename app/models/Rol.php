<?php

class Rol
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerRolPorId($id){
        $this->db->bind("SELECT * from rol WHERE id_rol = '$id'");
        return $this->db->execute();
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

    public function editarRol($datos){
        $id_rol = $datos['id_rol'];
        $jurado = $datos['jurado'];
        $supervisor = $datos['supervisor'];
        $testigo = $datos['testigo'];
        $votante = $datos['votante'];
        $administrador = $datos['administrador'];
        $this->db->query("UPDATE rol SET jurado='$jurado', supervisor='$supervisor', testigo='$testigo', votante='$votante', administrador='$administrador' WHERE id_rol = '$id_rol'");
        return $this->db->execute();
    }

    public function eliminarRol($id){
        $this->db->query("DELETE FROM rol WHERE id_rol='$id'");
        return $this->db->execute();
    }
}

















