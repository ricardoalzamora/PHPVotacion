<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function habilitarUsuario($id_usuario){
        $this->db->query("UPDATE usuarios SET estado=1 WHERE id_usuario = '$id_usuario'");
        return $this->db->execute();
    }

    public function votoUsuario($id_usuario){
        $this->db->query("UPDATE usuarios SET estado=2 WHERE id_usuario = '$id_usuario'");
        return $this->db->execute();
    }

    public function obtenerUsuarios(){
        $this->db->query('SELECT id_usuario, usuarios.nombre, usuarios.apellido, programas.nombre as programa_nombre, estado FROM usuarios JOIN programas ON usuarios.id_programa = programas.id_programa');
        return $this->db->registros();
    }

    public function obtenerUsuarioPorId($id){
        $this->db->query("SELECT *  FROM usuarios JOIN rol ON usuarios.id_rol = rol.id_rol WHERE id_usuario = '$id'");
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

    public function editarUsuario($datos){
        $id_usuario = $datos['id_usuario'];
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $estado = $datos['estado'];
        $id_mesa = $datos['id_mesa'];
        $id_programa = $datos['id_programa'];
        $contrasenia = $datos['contrasenia'];
        $this->db->query("UPDATE usuarios SET nombre='$nombre', apellido='$apellido', estado='$estado', id_mesa='$id_mesa', id_programa='$id_programa', contrasenia='$contrasenia' WHERE id_usuario = '$id_usuario'");
        return $this->db->execute();
    }

    public function asignarCandidato($datos){
        $id = $datos['id_candidato'];
        $this->db->query("UPDATE usuarios SET id_candidato='$id' WHERE id_usuario = '$id'");
        return $this->db->execute();
    }

    public function eliminarUsuario($id){
        $this->db->query("DELETE FROM usuarios WHERE id_usuario='$id'");
        return $this->db->execute();
    }

    public function inhabilitar($id){
        $this->db->query("UPDATE usuarios SET estado=0 WHERE id_usuario = '$id'");
        return $this->db->execute();
    }

}