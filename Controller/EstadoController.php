<?php
require_once "./Controller/Controller.php";
require_once "./Model/Estado.php";

class EstadoController extends Controller
{
    private $estado;
    function __construct(){
        $this->estado=new Estado();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $estados=$this->estado->getStates();
            header("HTTP/1.1 200");
            echo json_encode($estados);
            exit();
        }
    }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_POST;
            $this->estado->id=$input['id'];
            $this->estado->nombre=$input['nombre'];
            $state = $this->estado->addState();
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