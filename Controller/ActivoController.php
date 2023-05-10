<?php
require_once "./Controller/Controller.php";
require_once "./Model/Activo.php";

class ActivoController extends Controller
{
    private $activo;

    function __construct(){
        $this->activo=new Activo();
    }
    
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $activos=$this->activo->getAssets();
            header("HTTP/1.1 200");
            echo $activos;
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_POST;
            $this->activo->descripcion=$input['descripcion'];
            $this->activo->fecha=$input['fecha'];
            $this->activo->codigo=$input['codigo'];
            $this->activo->serieNumero=$input['serieNumero'];
            $this->activo->comentario=$input['comentario'];
            $this->activo->costo=$input['costo'];
            $this->activo->addAsset($input['subtipo_id'], $input['proveedor_id'],$input['estado_id'],
            $input['ubicacion_id'], $input['modelo_id'],$input['usuario_id'], );
            header("HTTP/1.1 200");
            exit();
        }    
    }
}
?>