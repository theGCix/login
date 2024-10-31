<?php
    class Conexion{
        static public function conectar(){
            $con= new PDO("mysql:host=localhost;dbname=login",
            "root",
            "");
            $con->exec("set names utf8");
            return $con;
        }
    }
?>