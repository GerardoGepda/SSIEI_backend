<?php
require_once "./Controller/Controller.php";
require_once "./Model/Subtipo.php";

class SubtipoController extends Controller
{
    private $subtipo;
    function __construct(){
        $this->subtipo=new Subtipo();
    }
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $subtipos=$this->subtipo->getSubTypes();
            header("HTTP/1.1 200");
            echo json_encode($subtipos);
            exit();
        } 
    }
    public function subTypesByType($id){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $subtipos=$this->subtipo->getSubTypesByType($id);
            header("HTTP/1.1 200");
            echo json_encode($subtipos);
            exit();
        } 
    }
}
?>