<?php
class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function verificarLogin($usuario, $password) {
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contraseña = '$password'";
        $resultado = $this->db->query($sql);
        return $resultado->fetch_assoc();
    }
    public function actualizarSaldo($id, $nuevoSaldo) {
        $sql = "UPDATE usuarios SET saldo = $nuevoSaldo WHERE id_usuario = $id";
        return $this->db->query($sql);
    }
}
?>