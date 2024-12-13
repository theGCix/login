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
            return $stmt -> fetchAll();
        }
        $stmt->close();
			$stmt = null;
    }
    /*=============================================
	ACTUALIZACION DE USUARIO
	=============================================*/
    static public function mdActualizarUsuario($tabla, $item1, $valor1, $item2,$valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
		
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}
		$stmt->close();
			$stmt = null;
	}
    /*=============================================
	REGISTRO DE USUARIO
	=============================================*/
	static public function mdRegistrarUsuario($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombres, apellidos, usuario, password, correo, token) 
			VALUES (:nombres, :apellidos, :usuario, :password, :correo, :token)");
			$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
			$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
			$stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
			if($stmt->execute()){

				return "ok";	
	
			}else{
	
				return "error";
			
			}
			$stmt->close();
			$stmt = null;
		
	}

	static public function mdConsultaCorreo($tabla,$correo,$contenido){
		$stmt = Conexion::conectar()->prepare("SELECT correo FROM $tabla WHERE $correo=:$correo LIMIT 1");
		$stmt->bindParam(":".$correo, $contenido, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt -> fetch(PDO::FETCH_ASSOC);
	}

	static public function mdConsultaUsuario($tabla,$usuario,$input_usuario){
		$stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE $usuario=:$usuario LIMIT 1");
		$stmt->bindParam(":".$usuario, $input_usuario, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt -> fetch(PDO::FETCH_ASSOC);
	}
}
?>