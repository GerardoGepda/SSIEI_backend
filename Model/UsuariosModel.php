<?php
require_once 'Model.php';
class UsuariosModel extends Model{

public function addUser($user=array()){
    $query="INSERT INTO usuarios 
    VALUES (null,:usuarioNombre,SHA2(:contrasena,256),:correo,:nombre,:apellido,:estado,:rol_id)";
    return $this->setQuery($query,$user);
}
public function validateUser($user,$pass){
    $query="SELECT nombreUsuario FROM usuarios
    WHERE nombreUsuario=:user AND contrasena=SHA2(:pass,256)";
    return $this->getQuery($query,['user'=>$user, 'pass'=>$pass]);
}
}