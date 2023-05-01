<?php
require_once "./Model/Model.php";

class Subtipo extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    public $tipo_id; //int FOREIGN KEY
    
    /*Métodos*/
    public function getSubTypes(){
        $query="SELECT S.id, S.nombre, T.Nombre as nombre_tipo
            FROM subtipos S INNER JOIN tipos T ON S.tipo_id=T.id";
            $rows = $this->getQuery($query);
        return $rows;
    }
    public function getSubTypesByType($idtype){
            $this->id = intval($idtype);
            $query="SELECT S.id, S.nombre, T.Nombre as nombre_tipo
            FROM subtipos S INNER JOIN tipos T ON S.tipo_id=T.id WHERE S.tipo_id=:id";
            $params = array("id" => $this->id);
            $rows = $this->getQuery($query, $params);  
        return $rows;
    }
}