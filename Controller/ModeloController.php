<?php
require_once "./Controller/Controller.php";
require_once "./Model/Modelo.php";

class ModeloController extends Controller
{
    private $modelo;
    
    function __construct(){
        $this->modelo=new Modelo();
    }

    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $modelos=$this->modelo->getModels();
            header("HTTP/1.1 200");
            echo json_encode($modelos);
            exit();
        } 
    }

    public function modelsByBrand($id){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $modelos=$this->modelo->getModelsByBrand($id);
            header("HTTP/1.1 200");
            echo json_encode($modelos);
            exit();
        } 
    }

    public function insert($idmarca)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_POST;
            $this->modelo->nombre=$input['nombre'];
            $state = $this->modelo->addModel($idmarca);
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