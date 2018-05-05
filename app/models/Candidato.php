<?php

class Candidato
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public  function  obtenerCandidatos(){
        $this->db->query('SELECT candidatos.id_candidato, foto, numero, id_organo, nombre, apellido FROM candidatos JOIN usuarios ON candidatos.id_candidato = usuarios.id_candidato');
        return $this->db->registros();
    }
}