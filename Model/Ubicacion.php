<?php
require_once "./Model/Model.php";

class Ubicacion extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    public $descripcion; //varchar(150)
    public $sede_id; //int FOREIGN KEY
    
    /*Métodos*/
    public function getLocations(){
        $query="SELECT U.id,U.nombre,S.Nombre as nombre_sede
            FROM ubicaciones U INNER JOIN sedes S ON U.id=S.id";
            $rows = $this->getQuery($query);
        return $rows;
    }

}