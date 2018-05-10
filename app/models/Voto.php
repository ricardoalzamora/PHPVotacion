<?php

class Voto
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerVotos(){
        $this->db->query('SELECT * FROM votos');
        return $this->db->execute();
    }

    public function agregarVoto($datos){
        if (strpos($datos['id_candidato'], 'blanco') !== false) {
            $this->db->query("INSERT INTO voto_blanco (voto, id_mesa) VALUES (:voto, :id_mesa)");
            $this->db->bind(":voto", $datos['id_candidato']);
            $this->db->bind(":id_mesa", $datos['mesa']);
            return $this->db->execute();
        }else{
            $this->db->query("INSERT INTO votos (id_candidato, id_mesa) VALUES (:id_candidato, :id_mesa)");
            $this->db->bind(":id_candidato", $datos['id_candidato']);
            $this->db->bind(":id_mesa", $datos['mesa']);
            return $this->db->execute();
        }

    }
}