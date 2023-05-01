<?php
require_once "./Model/Model.php";

class Estado extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    
    /*Métodos*/
    public function getStates()
    {
        $estados = new Estado();
        return $estados->getAll("estados");
    }
}