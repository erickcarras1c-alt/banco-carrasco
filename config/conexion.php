<?php
class Database {
    public static function conectar() {
        $conexion = new mysqli("localhost", "root", "", "banco_erick");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        return $conexion;
    }
}
?>