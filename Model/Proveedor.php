<?php
require_once "./Model/Model.php";

class Proveedor extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    
    /*Métodos*/
    public function getProviders($idproveedor = 0)
    {
        if ($idproveedor != 0) 
        {
            return $this->getAll("proveedores", intval($idproveedor));
        }
        else 
        {
            return $this->getAll("proveedores");
        }
    }

    public function addProvider()
    {
        $query="INSERT INTO proveedores
                VALUES (:id, :nombre)";
        $params = array
        (
            "id" => null,
            "nombre" => $this->nombre
        );
        return $this->setQuery($query, $params);
    }
}