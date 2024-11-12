<?php
class controladorUsuario{
    static public function ctrIngresoUsuario(){
        if(isset($_POST["ingUsuario"])){
            if(preg_match(pattern: '/^[a-zA-Z0-9]+$/', subject: $_POST["ingUsuario"])){
                $encriptar= $_POST["ingPassword"];
                // crypt(string: $_POST["ingPassword"],salt: '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $tabla="usuarios";
                $item="usuario";
                $valor=$_POST["ingUsuario"];
                $respuesta=modeloUsuario::mdMostrarUsuario(tabla: $tabla,item: $item,valor: $valor);
                if( is_array($respuesta) && $respuesta["password"]==$encriptar &&  $respuesta["usuario"]==$_POST["ingUsuario"]){
                    //var_dump($respuesta["usuario"]);
                    if($respuesta["estado"]==1){
                        $_SESSION["iniciarSesion"]="ok";
                        $_SESSION["id"]=$respuesta["id"];
                        $_SESSION["nombre"]=$respuesta["nombre"];
                        $_SESSION["usuario"]=$respuesta["usuario"];
                        date_default_timezone_set('America/Bogota');
						$fecha = date('Y-m-d');
						$hora = date('H:i:s');
						$fechaActual = $fecha.' '.$hora;
                        $item1 = "ultimo_login";
						$valor1 = $fechaActual;
						$item2 = "id";
						$valor2 = $respuesta["id"];
						$ultimoLogin = modeloUsuario::mdActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
                        if($ultimoLogin == "ok"){
							echo '<script>
								window.location = "";
							</script>';
						}		
                    }else{

						echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';
					}
            }else{
                echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                 }
            }
        }
   }
}
