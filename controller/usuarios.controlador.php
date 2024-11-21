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
                        // $_SESSION["nombre"]=$respuesta["nombre"];
                        $_SESSION["usuario"]=$respuesta["usuario"];
                        date_default_timezone_set('America/Bogota');
						$fecha = date('Y-m-d');
						$hora = date('H:i:s');
						$fechaActual = $fecha.' '.$hora;
                        $item1 = "ultimo_login";
						$valor1 = $fechaActual;
						$item2 = "id";
						$valor2 = $respuesta["id"];
						$ultimoLogin = modeloUsuario::mdActualizarUsuario($tabla, $item1,$valor1,$item2,$valor2);
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
   /*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoApellido"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

				$tabla = "usuarios";
				$correo= $_POST["nuevoCorreo"];
				//VERIFICAR SI EL CORREO YA EXISTE
				


				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array("nombres" => $_POST["nuevoNombre"],
                               "apellidos" => $_POST["nuevoApellido"],
					           "usuario" => $_POST["nuevoUsuario"],
					           "password" => $_POST["nuevoPassword"],
							   "correo" => $_POST["nuevoCorreo"],
					        //    "perfil" => $_POST["nuevoPerfil"],
					           );

				$respuesta = ModeloUsuario::mdRegistrarUsuario($tabla, $datos,$correo);

				// var_dump($respuesta);
			
				if($respuesta == "ok"){
					echo '<script>
					swal({
						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){
							window.location = "usuarios";
						}
					});
					</script>';
				}	
			}else{
				echo '<script>
					swal({
						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){
							window.location = "usuarios";
						}
					});
				</script>';
			}
		}
	}
}
