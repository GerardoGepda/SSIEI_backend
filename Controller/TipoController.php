<?php
require_once "./Controller/Controller.php";
require_once "./Model/Tipo.php";

class TipoController extends Controller
{
    private $tipo;

    function __construct(){
        $this->tipo=new Tipo();
    }

    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $tipos=$this->tipo->getTypes();
            header("HTTP/1.1 200");
            echo json_encode($tipos);
            exit();
        } 
    }
    
    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_POST;
            $this->tipo->nombre=$input['nombre'];
            $state = $this->tipo->addType();
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