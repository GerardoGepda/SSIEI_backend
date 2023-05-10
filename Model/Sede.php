<?php
require_once "./Model/Model.php";

class Sede extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)
    public $direccion; //text
    public $telefono; //int
    public $usuario_id; //int FOREIGN KEY
    
    /*Métodos*/
    public function getSedes($idsede = 0)
    {
        if ($idsede != 0) 
        {
            $query="SELECT S.*, U.usuarioNombre, U.nombre + ' ' + U.apellido as nombre_usuario
                    FROM sedes S INNER JOIN usuarios U ON S.usuario_id = U.id 
                    WHERE S.id = :id";
            $params = array
            (
                "id" => intval($idsede)
            );
            $rows = $this->getQuery($query, $params);
        }
        else
        {
            $query="SELECT S.*, U.usuarioNombre, U.nombre + ' ' + U.apellido as nombre_usuario
                    FROM sedes S INNER JOIN usuarios U ON S.usuario_id = U.id";
            $rows = $this->getQuery($query);
        }
        if (count($rows) != 0) 
        {
            return $rows;
        }
        else
        {
            return null;
        }
    }
    
    public function addSede($idusuario)
    {
        $this->usuario_id = $idusuario;
        $query="INSERT INTO sedes
                VALUES (:id, :nombre, :direccion, :telefono, :usuario_id)";
        $params = array
        (
            "id" => null,
            "nombre" => $this->nombre,
            "direccion" => $this->direccion,
            "telefono" => $this->telefono,
            "usuario_id" => $this->usuario_id
        );
        return $this->setQuery($query, $params);
    }
}