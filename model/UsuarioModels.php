<?php
class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = conexion::conectar();
    }

    public function verificarLogin($nombre_usuario, $contraseña) {
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contraseña = '$contraseña'";
        $resultado = $this->db->query($sql);
        return $resultado->fetch_assoc();
    }

    public function actualizarSaldo($id, $nuevoSaldo) {
        $sql = "UPDATE usuarios SET saldo = $nuevoSaldo WHERE id_usuario = $id";
        return $this->db->query($sql);
    }

    public function listarUsuarios() {
        $sql = "SELECT id_usuario, nombre_usuario, saldo FROM usuarios";
        $resultado = $this->db->query($sql);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }
}
?>