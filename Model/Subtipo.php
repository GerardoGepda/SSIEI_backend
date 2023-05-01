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
            FROM subtipos S INNER JOIN tipos T ON S.id=T.id";
            $rows = $this->getQuery($query);
        return $rows;
    }
}