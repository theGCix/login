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