<?php
require_once "./Model/Model.php";

class Tipo extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    
    /*Métodos*/
    public function getTypes(){
        $tipos = new Modelo();
        return $tipos->getAll("tipos");
    }
}