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

    public function agregarUsuario($datos){
        $this->db->query("INSERT INTO usuarios (id_usuario, nombre, apellido, estado, id_rol, id_mesa, id_programa, contrasenia) VALUES (:id_usuario, :nombre, :apellido, :estado, :id_rol, :id_mesa, :id_programa, :contrasenia)");
        $this->db->bind(':id_usuario', $datos['id_usuario']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':apellido', $datos['apellido']);
        $this->db->bind(':estado', $datos['estado']);
        $this->db->bind(':id_rol', $datos['id_rol']);
        $this->db->bind(':id_mesa', $datos['id_mesa']);
        $this->db->bind(':id_programa', $datos['id_programa']);
        $this->db->bind(':contrasenia', $datos['contrasenia']);
        return $this->db->execute();
    }

}