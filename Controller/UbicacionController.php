<?php
require_once "./Controller/Controller.php";
require_once "./Model/Ubicacion.php";

class UbicacionController extends Controller
{
    private $ubicacion;

    function __construct(){
        $this->ubicacion=new Ubicacion();
    }

    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $ubicaciones=$this->ubicacion->getLocations();
            header("HTTP/1.1 200");
            echo json_encode($ubicaciones);
            exit();
        } 
    }

    public function insert($idsede)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_POST;
            $this->ubicacion->nombre=$input['nombre'];
            $this->ubicacion->descripcion=$input['descripcion'];
            $state = $this->ubicacion->addLocation(intval($idsede));
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