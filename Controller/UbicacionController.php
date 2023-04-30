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
}
?>