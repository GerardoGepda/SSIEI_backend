<?php
require_once "./Controller/Controller.php";
require_once "./Model/Marca.php";

class MarcaController extends Controller
{
    private $marca;
    function __construct(){
        $this->marca=new Marca();
    }
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $marcas=$this->marca->getBrands();
            header("HTTP/1.1 200");
            echo json_encode($marcas);
            exit();
        } 
    }
}
?>