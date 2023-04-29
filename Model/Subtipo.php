<?php
require_once "./Model/Model.php";

class SubtipoModel extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    public $tipo_id; //int FOREIGN KEY
    
    /*Métodos*/
}