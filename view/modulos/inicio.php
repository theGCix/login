<?php


if(isset($_POST['logout'])) {
unset($_SESSION['iniciarSesion']);
session_destroy();
}
?>
        <form action="" method="post">
        <h1>Hola, ya ingresaste</h1>
                <!-- <input type="hidden" name="logout"/> -->
                
                <br>
                <button type="hidden" name="logout">Salir</button>
        </form>