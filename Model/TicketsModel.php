<?php
require_once 'Model.php';
class TicketsModel extends Model{

    public function addTicket($ticket=array()){
        $query="INSERT INTO tickets 
        VALUES (null,:activo_id,:usuario_id,:descripcion,:fecha,:fechaRevision,:fechaCierre,:ticketestado_id)";
        return $this->setQuery($query,$ticket);
    }
}