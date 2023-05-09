<?php
require_once "./Model/Model.php";

class Marca extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    
    /*Métodos*/
    public function getBrands($idmarca = 0)
    {
        if ($idmarca != 0) 
        {
            return $this->getAll("marcas", intval($idmarca));
        }
        else 
        {
            return $this->getAll("marcas");
        }
    }

    public function addBrand()
    {
        $query="INSERT INTO marcas
                VALUES (:id, :nombre)";
        $params = array
        (
            "id" => null,
            "nombre" => $this->nombre
        );
        return $this->setQuery($query, $params);
    }
}