<?php
//require_once "";
include_once 'Controller/ActivoController.php';
include_once 'Controller/MarcaController.php';
include_once 'Controller/ModeloController.php';
include_once 'Controller/TipoController.php';
include_once 'Controller/SubtipoController.php';
include_once 'Controller/ProveedorController.php';
include_once 'Controller/UbicacionController.php';
include_once 'Controller/UsuarioController.php';
include_once 'Controller/EstadoController.php';
$url=$_SERVER['REQUEST_URI'];
//define('BASEPATH',true);
session_start();//Iniciando sesion.
$url=explode("/",$url);
$controller=empty($url[2])?"Activo":$url[2];
$controller.="Controller";
$fileController="Controller/$controller.php";
$method=empty($url[3])?"index":$url[3];
$param=empty($url[4])?"":$url[4];
$controlador=new $controller();
$controlador->$method($param);
?>
