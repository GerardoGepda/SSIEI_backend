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

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_POST;
            $this->marca->nombre=$input['nombre'];
            $state = $this->marca->addBrand();
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