<?php
require_once "./Model/Model.php";

class Marca extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    
    /*Métodos*/
    public function getBrands(){
        $marcas = new Marca();
        return $marcas->getAll("marcas");
    }
}