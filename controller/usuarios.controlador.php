<?php
class controladorUsuario{
    static public function ctrUsuario(){
        if(isset($_POST["ingUsuario"])){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])){
                $encriptar=crypt($_POST["ingPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $tabla="usuarios";
                $item="usuario";
                $valor=$_POST["ingUsuario"];

                $respuesta=modeloUsuario::mdUsuario($tabla,$item,$valor);
                if($respuesta["usuario"]==$_POST["ingUsuario"] && 
                $respuesta["password"]==$encriptar){
                    if($respuesta["estado"]==1){
                        $_SESSION["iniciarSesion"]="ok";
                        $_SESSION["id"]=$respuesta["id"];
                        $_SESSION["nombre"]=$respuesta["nombre"];
                        $_SESSION["usuario"]=$respuesta["usuario"];
                        $_SESSION["foto"]=$respuesta["foto"];
                        $_SESSION["perfil"]=$respuesta["perfil"];                    }
                }
                /*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/
                date_default_timezone_set('America/Bogota');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = modeloUsuario::mdUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							echo '<script>

								window.location = "../view/inicio.php";

							</script>';

						}				
            }
        }
    }
}
?>