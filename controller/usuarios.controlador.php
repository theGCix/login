<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
class controladorUsuario{
    static public function ctrIngresoUsuario(){
        if(isset($_POST["ingreso_btn"])){
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
						echo '<div class="error-msg"><i class="fa fa-times-circle"></i> El usuario aún no está activado</div>';
					}
            }else{
                echo '<div class="error-msg"><i class="fa fa-times-circle"></i> Error al ingresar, intente de nuevo.</div>';
                 }
            }
        }
   }
   /*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){
		if(isset($_POST["resgistro_btn"])){
			if(
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			//    preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoApellido"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
			   ){
					
					// $nombres = $_POST["nuevoNombre"];
					// $email = $_POST["nuevoCorreo"];
					$token=md5(rand());
				/*=============================================
					ENVIO DE CORREO
				=============================================*/
				function sendemail_verify($token){
					//===================VARIABLES===================
					$email = $_POST["nuevoCorreo"];
					
					$mail = new PHPMailer();
					//Server settings
					$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
					$mail->isSMTP();                       
					$mail->Mailer = "smtp";                      //Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
					$mail->SMTPAuth   = true;    
					$mail->SMTPDebug = 0;                              //Enable SMTP authentication
					$mail->Username   = 'muebleriagm2024@gmail.com';                     //SMTP username
					$mail->Password   = 'fdkpurudwgibtywv';                               //SMTP password
					// $mail->Username   = 'gruiz@totalsf.com.pe';                     //SMTP username
					// $mail->Password   = 'Totalgruiz';                               //SMTP password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
					$mail->CharSet = 'utf-8';             //Enable implicit TLS encryption
					$mail->Port       = 465;   
					//Recipients
					$mail->setFrom($email,"Muebleria G&M");
					$mail->addAddress($email,"Hola estimado usuario");     //Add a recipient
					$mail->isHTML(true);
					$mail->Subject = 'Verificacion de correo con Muebleria G&M';
					$email_template="
					<h2>Te has registrado con Muebleria G&M</h2>
					<h5>Verifica tu direcccion de correo para iniciar sesion con el link que está debajo</h5>
					<a href='http://localhost/login/view/modulos/verify-email.php?token=$token'>Haz clic aqui</a>";
					$mail->Body = $email_template;
					$mail->send();
				}
				$tabla = "usuarios";
				//VERIFICAR SI EL CORREO YA EXISTE
				$correo= "correo";
				$contenido = $_POST["nuevoCorreo"];
				$check_correo= modeloUsuario::mdConsultaCorreo($tabla,$correo, $contenido);
				//VERIFICAR SI EL USUARIO ES REPETIDO
				$usuario="usuario";
				$input_usuario=$_POST["nuevoUsuario"];
				$check_usuario= modeloUsuario::mdConsultaUsuario($tabla,$usuario,$input_usuario);
				if($check_usuario == false){
					if($check_correo == false){
						$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
						$datos = array("nombres" => $_POST["nuevoNombre"],
										"apellidos" => $_POST["nuevoApellido"],
										"usuario" => $_POST["nuevoUsuario"],
										"password" => $_POST["nuevoPassword"],
										"correo" => $_POST["nuevoCorreo"],
										"token" => $token,
									//    "perfil" => $_POST["nuevoPerfil"],
										);
						$respuesta = ModeloUsuario::mdRegistrarUsuario($tabla, $datos);
						if($respuesta == "ok"){
							sendemail_verify($token);
							echo '<script>
								Swal.fire({
								title: "Registro completado!",
								text: "Su cuenta se ha regitrado correctamente!, Se ha enviado un correo de verificación",
								icon: "success"
								});
							</script>';
						}else{
							echo '<script>
								Swal.fire({
								icon: "error",
								title: "Oops...",
								text: "Los campos no pueden estar vacios!",
								});
							</script>';
						}	
					}else{
						echo '<script>
							Swal.fire({
							icon: "error",
							title: "Ups...",
							text: "El correo ya se encuentra registrado!",
							});
						</script>';
					}
				}else{
					echo '<script>
					Swal.fire({
					icon: "error",
					title: "Ups...",
					text: "El usuario ya se encuentra registrado!",
					});
				</script>';
				}
				}
				}
			}
	}


	

