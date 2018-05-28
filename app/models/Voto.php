<?php

class Voto
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerVotos(){
        $this->db->query('SELECT votos.id_candidato, count(votos.id_candidato) as cantidad, votos.id_mesa, candidatos.id_organo, organos.nombre as nombre_organo, usuarios.nombre as nombre_candidato, usuarios.apellido as apellido_candidato FROM votos RIGHT JOIN candidatos ON votos.id_candidato = candidatos.id_candidato JOIN organos ON organos.id_organo = candidatos.id_organo JOIN usuarios ON candidatos.id_candidato = usuarios.id_candidato group by votos.id_candidato');
        return $this->db->registros();
    }

    public function obtenerVotosMesa($id_mesa){
        $this->db->query("SELECT votos.id_candidato, count(votos.id_candidato) as cantidad, votos.id_mesa, candidatos.id_organo, organos.nombre as nombre_organo, usuarios.nombre as nombre_candidato, usuarios.apellido as apellido_candidato FROM votos RIGHT JOIN candidatos ON votos.id_candidato = candidatos.id_candidato JOIN organos ON organos.id_organo = candidatos.id_organo JOIN usuarios ON candidatos.id_candidato = usuarios.id_candidato WHERE votos.id_mesa = '$id_mesa' group by votos.id_candidato");
        return $this->db->registros();
    }

    public function obtenerVotosBlancos(){
        $this->db->query('select organo, count(organo) as cantidad, id_mesa, nombre from voto_blanco JOIN organos ON organo = id_organo group by organo');
        return $this->db->registros();
    }
    public function obtenerVotosBlancosMesa($id_mesa){
        $this->db->query("select organo, count(organo) as cantidad, id_mesa, nombre from voto_blanco JOIN organos ON organo = id_organo WHERE id_mesa = '$id_mesa' group by organo");
        return $this->db->registros();
    }

    public function agregarVoto($datos){
        if (strpos($datos['id_candidato'], 'blanco') !== false) {
            if($datos['id_candidato'] == '1blanco'){
                $blanco = 1;
            }
            if($datos['id_candidato'] == '2blanco'){
                $blanco = 2;
            }
            if($datos['id_candidato'] == '3blanco'){
                $blanco = 3;
            }
            if($datos['id_candidato'] == '4blanco'){
                $blanco = 4;
            }
            $this->db->query("INSERT INTO voto_blanco (organo, id_mesa) VALUES (:organo, :id_mesa)");
            $this->db->bind(":organo", $blanco);
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