<?php

require_once "conexion.php";

class modeloUsuario {
    /*=============================================
	MOSTRAR USUARIOS
	=============================================*/
    // $item= es el nombre del usuario(atributo de la tabla)
    // $tabla= es el nombre de la tabla(por ejemplo usuarios)
    // $valor= es lo que se ingresa por ejemplo dentro de $_POST["ingUsuario"] que se encuentra en el html
    static public function mdMostrarUsuario($tabla,$item,$valor){
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
            return $stmt -> fecthAll(PDO::FETCH_BOTH);
        }
        $stmt-> Close(PDO::FETCH_ASSOC);
        $stmt=null;
    }
    static public function mdActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}
?>