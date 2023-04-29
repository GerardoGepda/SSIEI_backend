<?php
require_once "./Model/Model.php";

class SedeModel extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    public $direccion; //text
    public $telefono; //int
    public $usuario_id; //int FOREIGN KEY
    
    /*Métodos*/
}