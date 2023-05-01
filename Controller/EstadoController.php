<?php
require_once "./Controller/Controller.php";
require_once "./Model/Estado.php";

class EstadoController extends Controller
{
    private $estado;
    function __construct(){
        $this->estado=new Estado();
    }
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $estados=$this->estado->getStates();
            header("HTTP/1.1 200");
            echo json_encode($estados);
            exit();
        }
    }

}