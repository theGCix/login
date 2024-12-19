<form action="" method="post">
                <!-- <input type="hidden" name="logout"/> -->
                <button type="hidden" name="logout">Salir</button>
            </form>

            <!-- <?php
if(isset($_POST['logout'])) {
unset($_SESSION['iniciarSesion']);
session_destroy();
}
?> -->

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


            <?php

if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

 echo '<div class="wrapper">';

  /*=============================================
  CABEZOTE
  =============================================*/

  include "modulos/cabezote.php";

  /*=============================================
  MENU
  =============================================*/

  include "modulos/menu.php";

  /*=============================================
  CONTENIDO
  =============================================*/

  if(isset($_GET["ruta"])){

    if($_GET["ruta"] == "inicio" ||
       $_GET["ruta"] == "usuarios" ||
       $_GET["ruta"] == "categorias" ||
       $_GET["ruta"] == "productos" ||
       $_GET["ruta"] == "clientes" ||
       $_GET["ruta"] == "ventas" ||
       $_GET["ruta"] == "crear-venta" ||
       $_GET["ruta"] == "editar-venta" ||
       $_GET["ruta"] == "reportes" ||
       $_GET["ruta"] == "salir"){

      include "modulos/".$_GET["ruta"].".php";

    }else{

      include "modulos/404.php";

    }

  }else{

    include "modulos/inicio.php";

  }

  /*=============================================
  FOOTER
  =============================================*/

  include "modulos/footer.php";

  echo '</div>';

}else{

  include "modulos/login.php";

}

?>


<?php
if(isset($_POST['logout'])) {
unset($_SESSION['iniciarSesion']);
session_destroy();
}
?>











<h2>Te has registrado con Muebleria G&M</h2>
					<h5>Verifica tu direcccion de correo para iniciar sesion con el link que está debajo</h5>
					<h4>su token es: $token</h4>
					<a href='http://localhost/login/view/modulos/verify-email.php?token=$token'>Haz clic aqui</a>



          $email_template="
					<h2>Te has registrado con Muebleria G&M</h2>
					<h5>Verifica tu direcccion de correo para iniciar sesion con el link que está debajo</h5>
					<h4>su token es: $token</h4>
					<a href='http://localhost/login/view/modulos/verify-email.php?token=$token'>Haz clic aqui</a>";
























          $email_template='
					<center>
					<table style="margin-top:24px;width:570px;background-color:#fff;color:#424242;text-align:left;border:1px solid #e0e0e0;border-radius:8px;border-spacing:0px;overflow:hidden">
						<tbody>
						<tr style="line-height:48px">
							<td>
							<a style="text-decoration:none;display:inline-block">
								<img align="left" src="https://voheiassets.azurewebsites.net/images/logo-mail.png" style="margin:16px 0 0 16px">
							</a>
							</td>
						</tr>
						<tr>
							<td style="padding:0 24px 30px">
							<h1 style="Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-weight:500;">Confirma tu correo</h1>
							<p style="Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size:18px;line-height:28px">
								Hola <b style="font-weight:500;">estimad@</b>,
								Gracias por registrarte a muebleria G&M!
								<br>
								Por favor haga clic en el enlace para completar el proceso de verificación de correo:
							</p>
							<center>
								<a href="http://localhost/login/view/modulos/verify-email.php?token=$token">VERIFICAR CORREO</a>
							</center>
							<br>
							<br>
							<p style="font-size:14px;line-height:28px;color:#616161;,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;">
								Enlace de verificación no funciona? Por favor, copie y pegue el enlace de verificación debajo de la barra de navegación e intente de nuevo.
								<br> <a>https://localhost:44392/<wbr>webmethods/User.aspx/<wbr>VerifyEmail?vc=</a>
							</p>
							</td>
						</tr>
						<tr>
							<td style="border-top:1px solid #eee;padding:8px;font-size:11px;color:#999999;font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-weight:400">
								Has recibido este correo debido a su configuración de formulario, si quiere cambiar estas configuraciones<a>click here</a>.
							</td>
						</tr>
						</tbody>
					</table>
					</center>';