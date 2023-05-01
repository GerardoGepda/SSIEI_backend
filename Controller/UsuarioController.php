<?php
require_once "./Controller/Controller.php";
require_once "./Model/Usuario.php";

class UsuarioController extends Controller
{
    private $usuario;
    function __construct(){
        $this->usuario=new Usuario();
    }
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $usuarios=$this->usuario->getUsers();
            header("HTTP/1.1 200");
            echo json_encode($usuarios);
            exit();
        }
    }

}
?>