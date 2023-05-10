<?php
require_once "./Controller/Controller.php";
require_once "./Model/Proveedor.php";

class ProveedorController extends Controller
{
    private $proveedor;
    function __construct(){
        $this->proveedor=new Proveedor();
    }
    
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $proveedores=$this->proveedor->getProviders();
            header("HTTP/1.1 200");
            echo json_encode($proveedores);
            exit();
        } 
    }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_POST;
            $this->proveedor->nombre=$input['nombre'];
            $state = $this->proveedor->addProvider();
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