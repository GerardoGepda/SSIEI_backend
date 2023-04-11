<?php

require_once "";

$url=$_SERVER['REQUEST_URI'];
define('BASEPATH',true);
session_start();//Iniciando sesion
$url=explode("/",$url);
$controller=empty($url[3])?"Index":$url[3];
$controller.="Controller";
$fileController="Controller/$controller.php";
$method=empty($url[4])?"index":$url[4];
$param=empty($url[5])?"":$url[5];
if(!is_file($fileController)){
    echo "<h1>Error 404</h1>";
    exit;
}
$controlador=new $controller();
if(!method_exists($controlador,$method)){
    echo "<h1>Error 404</h1>";
    exit;
}
$controlador->$method($param);

?>