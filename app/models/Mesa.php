<?php

class Mesa
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerMesas(){
        $this->db->query('SELECT * FROM mesas');
        return $this->db->registros();
    }

    public function obtenerMesaPorId($id){
        $this->db->query("SELECT * FROM mesas where id_mesa='$id'");
        return $this->db->registros();
    }
}