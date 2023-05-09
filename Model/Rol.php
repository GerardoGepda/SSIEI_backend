<?php
require_once "./Model/Model.php";

class Rol extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    
    /*Métodos*/
    public function getRoles($idrol = 0)
    {
        if ($idrol != 0) 
        {
            return $this->getAll("roles", intval($idrol));
        }
        else 
        {
            return $this->getAll("roles");
        }
    }

    public function addRol()
    {
        $query="INSERT INTO roles
                VALUES (:id, :nombre)";
        $params = array
        (
            "id" => $this->id,
            "nombre" => $this->nombre
        );
        return $this->setQuery($query, $params);
    }
}