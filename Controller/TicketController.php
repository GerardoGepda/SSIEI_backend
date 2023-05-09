<?php
require_once "./Controller/Controller.php";
require_once "./Model/Ticket.php";

class TicketController extends Controller
{
    private $ticket;
    function __construct(){
        $this->ticket=new Ticket();
    }

    public function Tickets($id){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $tickets=$this->ticket->getTickets($id);
            header("HTTP/1.1 200");
            echo json_encode($tickets);
            exit();
        } 
    }
}
?>