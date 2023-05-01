<?php
require_once "./Model/Model.php";

class Modelo extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    public $marca_id; //int FOREIGN KEY
    
    /*Métodos*/
    public function getModels(){
        $query="SELECT M.id,M.nombre,MA.Nombre as nombre_marca
            FROM modelos M INNER JOIN marcas MA ON M.id=MA.id";
            $rows = $this->getQuery($query);
        return $rows;
    }
    public function getModelsByBrand($idbrand){
        $this->id = intval($idbrand);
        $query="SELECT M.id,M.nombre,MA.Nombre as nombre_marca
            FROM modelos M INNER JOIN marcas MA ON M.marca_id=MA.id WHERE M.marca_id = :id";
            $params = array("id" => $this->id);
            $rows = $this->getQuery($query, $params);  
        return $rows;
    }
}