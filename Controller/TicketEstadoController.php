<?php
require_once "./Controller/Controller.php";
require_once "./Model/TicketEstado.php";

class TicketEstadoController extends Controller
{
    private $ticketEstado;

    function __construct(){
        $this->ticketEstado=new TicketEstado();
    }

    public function index($id)
    {
        $ticketEstado = $this->ticketEstado->getTicketStates($id);
        header("HTTP/1.1 200");
        echo $ticketEstado;
        exit();
    }
}