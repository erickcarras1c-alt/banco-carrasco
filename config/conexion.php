<?php
class conexion {
    public static function conectar(){
        $conexion = new mysqli("localhost","","banco_carrasco");
        if ($conexion->connect_error) {
            die("Error de conexion: ". $conexion->connect_error);
        }
        return $conexion;
    }
}