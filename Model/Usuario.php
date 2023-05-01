<?php
require_once './Model/Model.php';

class Usuario extends Model
{
    /*Propiedades*/
    public $id; //int
    public $usuarioNombre; //varchar(50)
    public $contrasena; //varchar(256)
    public $correo; //varchar(100)
    public $nombre; //varchar(25)
    public $apellido; //varchar(25)
    public $estado; //int
    public $rol_id; //int FOREIGN KEY

    /*Métodos*/
    public function addUser($idrol)
    {
        $this->rol_id = $idrol;
        $query="INSERT INTO usuarios 
        VALUES (:id,:usuarioNombre,:contrasena,:correo,:nombre,:apellido,:estado,:rol_id)";
        $params= array(
            "id" => null,
            "usuarioNombre" => $this->usuarioNombre,
            "contrasena" => "SHA2(".$this->contrasena.",256)",
            "correo" => $this->correo,
            "nombre" => $this->nombre,
            "apellido" => $this->apellido,
            "estado" => $this->estado,
            "rol_id" => $this->rol_id,
        );        
        return $this->setQuery($query,$params);
    }
    
    public function validateUser()
    {
        $query="SELECT * FROM usuarios
        WHERE usuarioNombre=:user AND contrasena=SHA2(:pass,256)";
        $params = array("user" => $this->usuarioNombre, "pass" => $this->contrasena);
        $rows = $this->getQuery($query, $params);
        if (count($rows) != 0)
        {
            return $rows;
        }
        else
        {
            return null;
        }
    }
    public function getUsers()
    {
        $query="SELECT U.id, U.usuarioNombre, U.contrasena, U.correo, U.nombre,U.apellido, 
        U.estado,R.nombre as nombre_rol FROM usuarios U 
        INNER JOIN roles R ON R.id=U.id";
            $rows = $this->getQuery($query);
        return $rows;
    }
}