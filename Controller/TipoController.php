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
}
?>