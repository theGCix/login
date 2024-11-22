<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="js/login.js">
   

   <!-- jQuery Number -->
   <script src="view/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- SweetAlert 2 -->
  <script src="view/plugins/sweetalert2/sweetalert2.all.js"></script>
   <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- <link rel="stylesheet" href="css/404.css"> -->
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<!--=====================================
CUERPO DOCUMENTO
======================================-->
    <body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
    <?php
    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
        if(isset($_GET["ruta"]))
        {
        if($_GET["ruta"] == "inicio")
            {
            include "modulos/".$_GET["ruta"].".php";
        }
        else{
            include "modulos/404.php";
        }
        }
        else{
            include "modulos/inicio.php";
        }
    }
    else{
        include "modulos/login.php";
    }
    
    ?>
    </body>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</html>