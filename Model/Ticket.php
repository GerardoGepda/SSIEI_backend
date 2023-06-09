<?php
require_once './Model/Model.php';

class Ticket extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $activo_id; //int FOREIGN KEY
    public $usuario_id; //int FOREIGN KEY
    public $descripcion; //varchar(250)
    public $fecha; //date
    public $fechaRevision; //date
    public $fechaCierre; //date
    public $ticketestado_id; //int FOREIGN KEY

    /*Métodos*/
    public function addTicket($idactivo, $idusuario, $idticketestado)
    {
        $this->ticketestado_id = $idticketestado;
        $this->activo_id = $idactivo;
        $this->usuario_id = $idusuario;
        $query="INSERT INTO tickets 
        VALUES (id,:activo_id,:usuario_id,:descripcion,:fecha,:fechaRevision,:fechaCierre,:ticketestado_id)";
        $params= array(
            "id" => null,
            "activo_id" => $this->activo_id,
            "usuario_id" => $this->usuario_id,
            "descripcion" => $this->descripcion,
            "fecha" => $this->fecha,
            "fechaRevision" => $this->fechaRevision,
            "fechaCierre" => $this->fechaCierre,
            "ticketestado_id" => $this->ticketestado_id
        );
        return $this->setQuery($query, $params);
    }

    public function getTickets($idasset)
    {
        if ($idasset != null) 
        {   
            $this->id = intval($idasset);
            $query="SELECT T.id, T.descripcion, U.nombre + ' ' + U.apellido as nombre_usuario, A.descripcion as nombre_activo, T.fecha, T.fechaRevision, 
            T.fechaCierre, TE.nombre as nombre_ticket_estado
            FROM tickets T INNER JOIN Activos A ON T.activo_id=A.id 
            INNER JOIN usuarios U ON U.id = T.usuario_id
            INNER JOIN ticketestados TE ON TE.id = T.ticketestado_id
            WHERE T.id = :id";
            $params = array("id" => $this->id);
            $rows = $this->getQuery($query, $params);
            return json_encode($rows);
        }
        else 
        {
            $query="SELECT T.id, T.descripcion, U.nombre + ' ' + U.apellido as nombre_usuario, A.descripcion as nombre_activo, T.fecha, T.fechaRevision, 
            T.fechaCierre, TE.nombre as nombre_ticket_estado
            FROM tickets T INNER JOIN Activos A ON T.activo_id=A.id 
            INNER JOIN usuarios U ON U.id = T.usuario_id
            INNER JOIN ticketestados TE ON TE.id = T.ticketestado_id ";
            $rows = $this->getQuery($query);
            return json_encode($rows);
        }
    }
}