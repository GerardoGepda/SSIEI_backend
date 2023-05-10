<?php
require_once "./Model/Model.php";

class TicketEstado extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $nombre; //varchar(50)

    /*Métodos*/
    public function getTicketStates($idticketestado = 0)
    {
        if ($idticketestado != 0) 
        {
            return json_encode($this->getAll("ticketestados", intval($idticketestado)));
        }
        else 
        {
            return json_encode($this->getAll("ticketestados"));
        }
    }

    public function addTicketState()
    {
        $query="INSERT INTO ticketestados
                VALUES (:id, :nombre)";
        $params = array
        (
            "id" => $this->id,
            "nombre" => $this->nombre
        );
        return $this->setQuery($query, $params);
    }
}