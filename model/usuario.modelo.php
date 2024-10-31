<?php

require_once "conexion.php";

class modeloUsuario {
    static public function mdUsuario($tabla,$item,$valor){
        if($item != null){
            $stmt= Conexion::conectar()->prepare(
                "SELECT * FROM $tabla WHERE $item = :$item");
           $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt -> fetch(PDO::FETCH_ASSOC);
        }else{
            $stmt = Conexion::conectar()->prepare(
                "SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt ->fecthAll();
        }
        $stmt-> Close();
        $stmt=null;
    }
}
?>