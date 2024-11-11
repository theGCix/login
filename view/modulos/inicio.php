<?php
if(isset($_POST['logout'])) {
unset($_SESSION['iniciarSesion']);
session_destroy();
}
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu</title>
    </head>
            <h1>Hola, ya ingresaste</h1>
            
        <form action="" method="post">
                <!-- <input type="hidden" name="logout"/> -->
                <button type="hidden" name="logout">Salir</button>
        </form>
</html>
    