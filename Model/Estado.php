<?php
require_once "./Model/Model.php";

class Estado extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    
    /*Métodos*/
    public function getStates($idestado = 0)
    {
        if ($idestado != 0) 
        {
            return $this->getAll("estados", intval($idestado));
        }
        else 
        {
            return $this->getAll("estados");
        }
    }

    public function addState()
    {
        $query="INSERT INTO estados
                VALUES (:id, :nombre)";
        $params = array
        (
            "id" => $this->id,
            "nombre" => $this->nombre
        );
        return $this->setQuery($query, $params);
    }
}