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
        $modelos = new Modelo();
        return $modelos->getAll("modelos");
    }
}