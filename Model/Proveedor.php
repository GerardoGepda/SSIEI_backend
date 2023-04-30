<?php
require_once "./Model/Model.php";

class Proveedor extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    
    /*Métodos*/
    public function getProviders(){
        $proveedores = new Modelo();
        return $proveedores->getAll("proveedores");
    }
}