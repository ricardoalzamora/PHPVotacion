<?php

class Organo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerOrganos(){
        $this->db->query('SELECT * FROM organos');
        return $this->db->registros();
    }
}