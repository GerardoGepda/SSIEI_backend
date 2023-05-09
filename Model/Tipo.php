<?php
require_once "./Model/Model.php";

class Tipo extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    
    /*Métodos*/
    public function getTypes($idtipo = 0)
    {
        if ($idtipo != 0) 
        {
            return $this->getAll("tipos", intval($idtipo));
        }
        else 
        {
            return $this->getAll("tipos");
        }
    }

    public function addType()
    {
        $query="INSERT INTO tipos
                VALUES (:id, :nombre)";
        $params = array
        (
            "id" => null,
            "nombre" => $this->nombre
        );
        return $this->setQuery($query, $params);
    }
}