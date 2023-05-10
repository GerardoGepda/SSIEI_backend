<?php
require_once "./Controller/Controller.php";
require_once "./Model/Ticket.php";

class TicketController extends Controller
{
    private $ticket;
    function __construct(){
        $this->ticket=new Ticket();
    }

    public function index($id){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $tickets=$this->ticket->getTickets($id);
            header("HTTP/1.1 200");
            echo $tickets;
            exit();
        } 
    }

    public function insert($idactivo, $idusuario, $idticketestado)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_POST;
            $this->ticket->descripcion=$input['descripcion'];
            $this->ticket->fecha=date('Y-m-d');
            $this->ticket->fechaRevision=$input['fechaRevision'];
            $this->ticket->fechaCierre=$input['fechaCierre'];
            $state = $this->ticket->addTicket(intval($idactivo),intval($idusuario), intval($idticketestado));
            if($state != -1)
            {
                return  json_encode(["code" =>1, "msg"=> "Insertado con exito"]);
            }
            else
            {
                return  json_encode(["code" =>0, "msg"=> "Error"]);
            }
            header("HTTP/1.1 200");
            exit();
        }
    }
}
?>
