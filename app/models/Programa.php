<?php

class Programa
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public  function  obtenerProgramas(){
        $this->db->query('SELECT * FROM programas');
        return $this->db->registros();
    }
}