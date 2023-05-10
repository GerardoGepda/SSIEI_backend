<?php
require_once "./Model/Model.php";

class Subtipo extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    public $tipo_id; //int FOREIGN KEY
    
    /*Métodos*/
    public function getSubTypes($idsubtipo = 0)
    {
        if ($idsubtipo != 0)
        {
            $query="SELECT S.id, S.nombre, T.Nombre as nombre_tipo
                    FROM subtipos S INNER JOIN tipos T ON S.tipo_id=T.id
                    WHERE S.id = :id";
            $params = array("id" => intval($idsubtipo));
            $rows = $this->getQuery($query, $params);
        }
        else
        {  
            $query="SELECT S.id, S.nombre, T.Nombre as nombre_tipo
                    FROM subtipos S INNER JOIN tipos T ON S.tipo_id=T.id";
            $rows = $this->getQuery($query);
        }
        return $rows;
    }

    public function getSubTypesByType($idtype)
    {
        $query="SELECT S.id, S.nombre, T.Nombre as nombre_tipo
                FROM subtipos S INNER JOIN tipos T ON S.tipo_id=T.id 
                WHERE S.tipo_id=:id";
        $params = array("id" => intval($idtype));
        return $this->getQuery($query, $params);  
    }

    public function addSubType($idtipo)
    {
        $this->tipo_id = $idtipo;
        $query="INSERT INTO subtipos
                VALUES (:id, :nombre, :tipo_id)";
        $params = array
        (
            "id" => null,
            "nombre" => $this->nombre,
            "tipo_id" => $this->tipo_id
        );
        return $this->setQuery($query, $params);
    }
}