<?php

class JuradoModel{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function registrarJurado($datos){
        $this->db->query("INSERT INTO jurados_activos (id_jurado, id_mesa) VALUES (:id_jurado, :id_mesa)");
        $this->db->bind(':id_jurado', $datos['id_jurado']);
        $this->db->bind(':id_mesa', $datos['id_mesa']);
        return $this->db->execute();
    }

}