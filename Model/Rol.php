<?php
require_once "./Model/Model.php";

class Rol extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    
    /*Métodos*/
    public function getRoles(){
        $roles = new Rol();
        return $roles->getAll("roles");
    }
}