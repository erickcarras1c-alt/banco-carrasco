<?php
class BancoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new UsuarioModel();
    }
        public function login() {
        $user = isset($_GET['u']) ? $_GET['u'] : '';
        $pass = isset($_GET['p']) ? $_GET['p'] : '';
        if ($user != '' && $pass != '') {
            $usuarioLogueado = $this->modelo->verificarLogin($user, $pass);
            
            if ($usuarioLogueado) {
                echo "LOGIN EXITOSO.<br>";
                echo "Bienvenido, " . $usuarioLogueado['nombre_usuario'] . "<br>";
                echo "Saldo actual: $" . $usuarioLogueado['saldo'];
            } else {
                echo "ERROR: Credenciales incorrectas.";
            }
        } else {
            echo "ADVERTENCIA: Falta ingresar usuario (u) o password (p).";
        }
    }

    public function retiro() {
        $id_usuario = 1; 
        $saldo = 1300; 
        $montoRetiro = isset($_GET['monto']) ? $_GET['monto'] : 0;
        if ($montoRetiro > 0) {
            if ($montoRetiro <= $saldo) {
                $nuevoSaldo = $saldo - $montoRetiro;
                $this->modelo->actualizarSaldo($id_usuario, $nuevoSaldo);
                
                echo "RETIRO APROBADO.<br>";
                echo "Has retirado: $" . $montoRetiro . "<br>";
                echo "Tu nuevo saldo es: $" . $nuevoSaldo;
            } else {
                echo "ERROR: Fondos insuficientes.";
            }
        } else {
            echo "Por favor, indique el monto a retirar en la URL (monto=X).";
        }
    }
}
?>