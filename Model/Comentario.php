<?php
require_once "./Model/Model.php";

class ComentarioModel extends Model 
{
    /*Propiedades*/
    public $id; //int 
    public $ticket_id; //int FOREIGN KEY
    public $usuario_id; //int FOREIGN KEY
    public $mensaje; //text
    public $fecha; //timestamp

    /*Métodos*/
    public function addComment($idticket, $idusuario)
    {
        $this->ticket_id = $idticket;
        $this->usuario_id = $idusuario;
        $fecha = new DateTime(); 
        $query = "INSERT INTO comentarios 
        VALUES (:id, :ticket_id, :usuario_id, :mensaje, :fecha)";
        $params= array(
            "id" => null,
            "ticket_id" => $this->ticket_id,
            "usuario_id" => $this->usuario_id,
            "mensaje" => $this->mensaje,
            "fecha" => $fecha->getTimestamp() //por defecto la fecha actual
        );
        return $this->setQuery($query, $params);
    }

    public function getCommentsbyTicket($idticket)
    {
        //Muestra el chat referente al ticket
        $query="SELECT C.*, T.descripcion FROM comentarios C INNER JOIN tickets T ON C.id = T.id WHERE T.id = :idticket";
        $params = array("idticket" => intval($idticket));
        $rows = $this->getQuery($query, $params);
        if (count($rows) != 0) 
        {
            return $rows;
        }
        else
        {
            return null;
        }
    }
}