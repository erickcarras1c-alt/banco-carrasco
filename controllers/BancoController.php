<?php
class BancoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new UsuarioModel();
    }

    public function inicio() {
        $titulo = "Inicio";
        include 'views/inicio.php';
    }

    public function login() {
        // NUEVO: Se usa $_REQUEST en lugar de $_GET para recibir datos del formulario (POST) o de la URL (GET)
        $user = isset($_REQUEST['u']) ? $_REQUEST['u'] : '';
        $pass = isset($_REQUEST['p']) ? $_REQUEST['p'] : '';
        
        $mensaje = '';
        $usuarioLogueado = null;

        if ($user != '' && $pass != '') {
            $usuarioLogueado = $this->modelo->verificarLogin($user, $pass);
            if ($usuarioLogueado) {
                $mensaje = "LOGIN EXITOSO.";
            } else {
                $mensaje = "ERROR: Credenciales incorrectas.";
            }
        } else {
            $mensaje = "ADVERTENCIA: Falta ingresar usuario (u) o password (p).";
        }

        $titulo = "Login";
        include 'views/login.php';
    }

    public function retiro() {
        $idUsuario = 1;
        $saldoActual = 1500;
        $montoRetiro = isset($_GET['monto']) ? $_GET['monto'] : 0;
        $mensaje = '';
        $nuevoSaldo = $saldoActual;

        if ($montoRetiro > 0) {
            if ($montoRetiro <= $saldoActual) {
                $nuevoSaldo = $saldoActual - $montoRetiro;
                $this->modelo->actualizarSaldo($idUsuario, $nuevoSaldo);
                $mensaje = "RETIRO APROBADO.";
            } else {
                $mensaje = "ERROR: Fondos insuficientes.";
            }
        } else {
            $mensaje = "Por favor, indique el monto a retirar en la URL (monto=X).";
        }

        $titulo = "Retiro";
        include 'views/retiro.php';
    }

    public function listarUsuarios() {
        $usuarios = $this->modelo->listarUsuarios();
        $titulo = "Listado de Usuarios";
        include 'views/usuarios.php';
    }
}
?>