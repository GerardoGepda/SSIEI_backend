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
    public function getLocations($idubicacion = 0)
    {
        if ($idubicacion != 0) 
        {   
            $query="SELECT U.*, S.Nombre as nombre_sede
                    FROM ubicaciones U INNER JOIN sedes S ON U.sede_id=S.id
                    WHERE U.id = :idsede";
            $params = array("idsede" => intval($idubicacion));
            $rows = $this->getQuery($query, $params);
        } 
        else 
        {
            $query="SELECT U.*, S.Nombre as nombre_sede
                    FROM ubicaciones U INNER JOIN sedes S ON U.sede_id=S.id";
            $rows = $this->getQuery($query);
        }
        return $rows;
    }

    public function getLocationsbySede($idsede)
    {
        $query="SELECT U.*, S.Nombre as nombre_sede
                FROM ubicaciones U INNER JOIN sedes S ON U.sede_id=S.id
                WHERE U.sede_id = :idsede
                ORDER BY U.id";
        $params = array("idsede" => intval($idsede));
        return $this->getQuery($query, $params);
    }

    public function addLocation($idsede)
    {
        $this->sede_id = $idsede;
        $query="INSERT INTO ubicaciones 
        VALUES (:id, :nombre, :descripcion, :sede_id)";
        $params= array(
            "id" => null,
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
            "sede_id" => $this->sede_id,
        );        
        return $this->setQuery($query, $params);
    }
}