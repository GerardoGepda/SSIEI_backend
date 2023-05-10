<?php
require_once './Model/Model.php';

class Activo extends Model
{
    /*Propiedades*/
    public $id; //int 
    public $descripcion; //text
    public $fecha; //date
    public $costo; //decimal(10,2)
    public $codigo; //varchar(25)
    public $serieNumero; //varchar(25)
    public $comentario; //text
    public $subtipo_id; //int FOREIGN KEY
    public $proveedor_id; //int FOREIGN KEY 
    public $estado_id; //int FOREIGN KEY
    public $ubicacion_id; //int FOREIGN KEY
    public $modelo_id; //int FOREIGN KEY 
    public $usuario_id; //int FOREIGN KEY

    /*Métodos*/
    public function getAssets($idasset = 0)
    {
        if ($idasset != 0) 
        {   
            $this->id = intval($idasset);
            $query="SELECT A.id, A.descripcion, A.fecha, A.costo, A.codigo, A.serieNumero, A.comentario,
            S.nombre as nombre_subtipo,P.nombre as nombre_proveedor, 
            E.nombre as nombre_estado, U.nombre as nombre_ubicacion, 
            M.nombre as nombre_modelo, R.usuarioNombre 
            FROM activos A INNER JOIN ubicaciones U ON U.id=A.ubicacion_id 
            INNER JOIN usuarios R ON R.id = A.usuario_id 
            INNER JOIN modelos M ON M.id=A.modelo_id 
            INNER JOIN estados E ON E.id=A.estado_id 
            INNER JOIN proveedores P ON P.id=A.proveedor_id 
            INNER JOIN subtipos S ON S.id=A.subtipo_id WHERE A.id = :id";
            $params = array("id" => $this->id);
            $rows = $this->getQuery($query, $params);
        }
        else 
        {
            $query="SELECT A.id, A.descripcion, A.fecha, A.costo, A.codigo, A.serieNumero, A.comentario,
            S.nombre as nombre_subtipo,P.nombre as nombre_proveedor, E.nombre as nombre_estado, 
            U.nombre as nombre_ubicacion, M.nombre as nombre_modelo, R.usuarioNombre as nombre_usuario
            FROM activos A INNER JOIN ubicaciones U ON U.id=A.ubicacion_id 
            INNER JOIN usuarios R ON R.id = A.usuario_id 
            INNER JOIN modelos M ON M.id=A.modelo_id 
            INNER JOIN estados E ON E.id=A.estado_id 
            INNER JOIN proveedores P ON P.id=A.proveedor_id 
            INNER JOIN subtipos S ON S.id=A.subtipo_id";
            $rows = $this->getQuery($query);
            
        }
        if (count($rows) != 0) 
        {
            return json_encode($rows);
        }
        else
        {
            //No hay activos en la base de datos o la consulta retornó null
            return null;
        }
    }

    public function addAsset($idsubtipo, $idproveedor, $idestado, $idubicacion, $idmodelo, $idusuario)
    {
        $this->subtipo_id = $idsubtipo;
        $this->proveedor_id = $idproveedor;
        $this->estado_id = $idestado;
        $this->ubicacion_id = $idubicacion;
        $this->modelo_id = $idmodelo;
        $this->usuario_id = $idusuario;
        $query = "INSERT INTO activos 
        VALUES (:id, :descripcion, :fecha, :costo, :codigo, :serieNumero, :comentario, :subtipo_id, :proveedor_id, :estado_id, :ubicacion_id, :modelo_id, :usuario_id)";
        $params= array(
            "id" => null,
            "descripcion" => $this->descripcion,
            "fecha" => $this->fecha,
            "costo" => $this->costo,
            "codigo" => $this->codigo,
            "serieNumero" => $this->serieNumero,
            "comentario" => $this->comentario,
            "subtipo_id" => $this->subtipo_id,
            "proveedor_id" => $this->proveedor_id,
            "estado_id" => $this->estado_id,
            "ubicacion_id" => $this->ubicacion_id,
            "modelo_id" => $this->modelo_id,
            "usuario_id" => $this->usuario_id
        );
        return $this->setQuery($query, $params);
    }

    public function updateAsset()
    {
        $query="UPDATE activos SET descripcion=:descripcion, fecha=:fecha, costo=:costo, codigo=:codigo,
        serieNumero=:serieNumero, comentario=:comentario, subtipo_id=:subtipo_id, proveedor_id=:proveedor_id,
        estado_id=:estado_id, ubicacion_id=:ubicacion_id, modelo_id=:modelo_id, usuario_id=:usuario_id WHERE id=:id";
        $params= array(
            "id" => $this->id,
            "descripcion" => $this->descripcion,
            "fecha" => $this->fecha,
            "costo" => $this->costo,
            "codigo" => $this->codigo,
            "serieNumero" => $this->serieNumero,
            "comentario" => $this->comentario,
            "subtipo_id" => $this->subtipo_id,
            "proveedor_id" => $this->proveedor_id,
            "estado_id" => $this->estado_id,
            "ubicacion_id" => $this->ubicacion_id,
            "modelo_id" => $this->modelo_id,
            "usuario_id" => $this->usuario_id
        );
        return $this->setQuery($query,$params);
    }

    public function removeAsset($idasset)
    {
        $this->id = intval($idasset);
        $query="DELETE FROM activos WHERE id=:id";
        return $this->setQuery($query,['id'=>$this->id]);
    }
}