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
}