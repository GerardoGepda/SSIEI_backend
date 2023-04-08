<?php
require_once 'Model.php';
class ActivosModel extends Model{
    
    public function getAssets(){
        $query="SELECT A.id, A.descripcion, A.fecha, A.costo, A.codigo, A.serieNumero, A.comentario,
        S.nombre,P.nombre, E.nombre, U.nombre, M.nombre, R.usuarioNombre
            FROM activos A INNER JOIN ubicaciones U ON U.id=A.id INNER JOIN usuarios R ON R.id = A.id 
            INNER JOIN modelos M on M.id=A.id INNER JOIN estados E ON E.id=A.id 
            INNER JOIN proveedores P ON P.id=A.id INNER JOIN subtipos S ON S.id=A.id";
            return $this->getQuery($query);
    }
    public function addAsset($asset=array()){
        $query="INSERT INTO activos 
        VALUES (null,:descripcion,:fecha,:costo,:codigo,:serieNumero,:comentario,:subtipo_id,
        :proveedor_id,:estado_id,:ubicacion_id,:modelo_id,:usuario_id)";
        return $this->setQuery($query,$asset);
    }
    public function updateAsset($asset=array()){
        $query="UPDATE activos SET descripcion=:descripcion, fecha=:fecha, costo=:costo, codigo=:codigo,
        serieNumero=:serieNumero, comentario=:comentario, subtipo_id=:subtipo_id, proveedor_id=:proveedor_id,
        estado_id=:estado_id, ubicacio_id=:ubicacion_id, modelo_id=:modelo_id, usuario_id=:usuario_id";
        return $this->setQuery($query,$asset);
    }
    public function removeAsset($id){
        $query="DELETE FROM activos WHERE id=:id";
        return $this->setQuery($query,['id'=>$id]);
    }

}