<?php
require_once "./Controller/Controller.php";
require_once "./Model/Rol.php";

class RolController extends Controller
{
    private $rol;

    function __construct(){
        $this->rol=new Rol();
    }

    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $roles=$this->rol->getRoles();
            header("HTTP/1.1 200");
            echo json_encode($roles);
            exit();
        } 
    }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_POST;
            $this->rol->id=$input['id'];
            $this->rol->nombre=$input['nombre'];
            $state = $this->rol->addRol();
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