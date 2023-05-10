<?php
require_once "./Model/Model.php";

class Modelo extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    public $marca_id; //int FOREIGN KEY
    
    /*Métodos*/
    public function getModels($idmodelo = 0)
    {
        if ($idmodelo != 0) 
        {
            $query="SELECT M.id, M.nombre, MA.nombre as nombre_marca
                    FROM modelos M INNER JOIN marcas MA ON M.marca_id=MA.id
                    WHERE M.id = :idmodel";
            $params = array("idmodel" => intval($idmodelo)); 
            $rows = $this->getQuery($query, $params);  
        }
        else 
        {
            $query="SELECT M.id, M.nombre, MA.nombre as nombre_marca
                    FROM modelos M INNER JOIN marcas MA ON M.marca_id=MA.id";
            $rows = $this->getQuery($query);
        }
        return $rows;
    }

    public function getModelsByBrand($idmarca)
    {
        $this->marca_id = intval($idmarca);
        $query="SELECT M.id, M.nombre, MA.Nombre as nombre_marca
                FROM modelos M INNER JOIN marcas MA ON M.marca_id=MA.id 
                WHERE M.marca_id = :id";
        $params = array("id" => $this->marca_id);
        $rows = $this->getQuery($query, $params);  
        return $rows;
    }

    public function addModel($idmarca)
    {
        $this->marca_id = $idmarca;
        $query="INSERT INTO modelos
                VALUES (:id, :nombre, :marca_id)";
        $params = array 
        (
            "id" => null,
            "nombre" => $this->nombre,
            "marca_id" => $this->marca_id
        );
        return $this->setQuery($query, $params);
    }
}