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
}
?>