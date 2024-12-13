<?php
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;
    require_once "controller/plantilla.controlador.php";
    require_once "controller/usuarios.controlador.php";

    require_once "model/usuario.modelo.php";

    $plantilla= new controladorPlantilla();
    $plantilla->ctrPlantilla();

    
?>