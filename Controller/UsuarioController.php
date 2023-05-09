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
    public function insert(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_POST;
            $this->usuario->usuarioNombre=$input['usuarioNombre'];
            $this->usuario->contrasena=$input['contrasena'];
            $this->usuario->correo=$input['correo'];
            $this->usuario->nombre=$input['nombre'];
            $this->usuario->apellido=$input['apellido'];
            $this->usuario->estado=$input['estado'];
            echo $this->usuario->addUser($input['rol_id']);
            header("HTTP/1.1 200");
            exit();
        }
    }

}
?>