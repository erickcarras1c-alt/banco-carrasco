<?php
class conexion {
    public static function conectar() {
        $host = "localhost";
        $usuario = "root"; 
        $password = "";    
        $db = "banco_erick"; 

        $conexion = new mysqli($host, $usuario, $password, $db);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        return $conexion;
    }
}
?>