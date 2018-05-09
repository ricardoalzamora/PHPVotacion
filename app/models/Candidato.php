<?php

class Candidato
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerCandidatos(){
        $this->db->query('SELECT usuarios.nombre, usuarios.apellido, candidatos.numero, candidatos.id_candidato, organos.id_organo, organos.nombre as organo_nombre FROM candidatos JOIN usuarios ON candidatos.id_candidato = usuarios.id_usuario JOIN organos ON organos.id_organo = candidatos.id_organo');
        return $this->db->registros();
    }

    public function obtenerCandidatoPorId($id){
        $this->db->query("SELECT *  FROM candidatos WHERE id_candidato = '$id'");
        return $this->db->registros();
    }

    public function agregarCandidato($datos){
        $this->db->query("INSERT INTO candidatos (id_candidato, foto, numero, id_organo) VALUES (:id_candidato, :foto, :numero, :id_organo)");
        $this->db->bind(':id_candidato', $datos['id_candidato']);
        $this->db->bind(':foto', $datos['foto']);
        $this->db->bind(':numero', $datos['numero']);
        $this->db->bind(':id_organo', $datos['id_organo']);
        return $this->db->execute();
    }

    public function editarCandidato($datos){
        $id_candidato = $datos['id_candidato'];
        $numero = $datos['numero'];
        $id_organo = $datos['id_organo'];
        $this->db->query("UPDATE candidatos SET numero='$numero', id_organo='$id_organo' WHERE id_candidato='$id_candidato'");
        return $this->db->execute();
    }

    public function eliminarUsuario($id){
        $this->db->query("DELETE FROM candidatos WHERE id_candidato='$id'");
        return $this->db->execute();
    }
}