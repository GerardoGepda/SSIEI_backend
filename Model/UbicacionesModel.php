<?php
require_once "./Model/Model.php";

class UbicacionesModel extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    public $descripcion; //varchar(150)
    public $sede_id; //int FOREIGN KEY
    
    /*Métodos*/
}