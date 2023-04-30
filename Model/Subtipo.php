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
        $subtipos = new Modelo();
        return $subtipos->getAll("subtipos");
    }
}