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
}
?>