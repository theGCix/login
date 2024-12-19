<?php
require "../../model/usuario.modelo.php";
    if(isset($_GET['token'])){
        $token="token";
        $tabla="usuarios";
        $getToken=$_GET['token'];
        $verify_token=modeloUsuario::mdVerificarToken($tabla,$token, $getToken);
        // var_dump($verify_token['estado']);
        if(isset($verify_token)){
            $row=$verify_token['estado'];
            if($row=="0"){
                 $item1="estado";
                 $item2="token";
                 $valor1="1";
                 $valor2=$verify_token['token'];
                $actualizar_token=modeloUsuario::mdActualizarEstadoToken(
                    $tabla,
                    $item1,
                    $valor1,
                    $item2,
                    $valor2
                );
                if($actualizar_token=="ok"){
                    echo "Su cuenta ha sido verificada";
                }else{
                    echo 'Verificación fallida!';
                }
            }else{
                echo 'Correo ya cerificado, por favor inicie sesión';
            }
        }else{
            echo 'Acceso denegado';
        }
    }
?>