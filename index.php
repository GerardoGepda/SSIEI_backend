<?php
//require_once "";
include_once 'Controller/ActivoController.php';
$url=$_SERVER['REQUEST_URI'];
define('BASEPATH',true);
session_start();//Iniciando sesion
$url=explode("/",$url);
$controller=empty($url[2])?"Activo":$url[2];
$controller.="Controller";
$fileController="Controller/$controller.php";
$method=empty($url[3])?"index":$url[3];
$param=empty($url[4])?"":$url[4];
/*if(!is_file($fileController)){
    echo "<h1>Error 404</h1>";
    exit;
}*/
$controlador=new $controller();
/*if(!method_exists($controlador,$method)){
    echo "<h1>Error 404</h1>";
    exit;
}*/
$controlador->$method($param);
?>