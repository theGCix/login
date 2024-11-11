<form action="" method="post">
                <!-- <input type="hidden" name="logout"/> -->
                <button type="hidden" name="logout">Salir</button>
            </form>

            <?php
if(isset($_POST['logout'])) {
unset($_SESSION['iniciarSesion']);
session_destroy();
}
?>

<!-- </div> -->
                <!-- <div class="login slide-up">
                <div class="center">
                    <h2 class="form-title" id="login"><span>o</span>Resgistrate</h2>
                    <div class="form-holder">
                    <input type="email" class="input" placeholder="Correo" />
                    <input type="password" class="input" placeholder="Contraseña" />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <button class="submit-btn">Iniciar Sesion</button>
                </div> -->
            <!-- </div> -->


            if(isset($_POST["ingUsuario"])){
            if(preg_match(pattern: '/^[a-zA-Z0-9]+$/', subject: $_POST["ingUsuario"])){
                $encriptar=crypt(string: $_POST["ingPassword"],salt: '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $tabla="usuarios";
                $item="usuario";
                $valor=$_POST["ingUsuario"];
                $respuesta=modeloUsuario::mdMostrarUsuario(tabla: $tabla,item: $item,valor: $valor);
                if($respuesta["usuario"]==$_POST["ingUsuario"] && 
                $respuesta["password"]==$encriptar){
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
								window.location = "inicio";
							</script>';
						}		
                    }else{

						echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';
                            echo var_dump($respuesta);
					}
            }else{
                echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                 echo var_dump($respuesta);
                 }
            }
        }