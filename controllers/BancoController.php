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
        $user = isset($_REQUEST['u']) ? $_REQUEST['u'] : '';
        $pass = isset($_REQUEST['p']) ? $_REQUEST['p'] : '';
        
        $mensaje = '';
        $usuarioLogueado = null;

        if ($user != '' && $pass != '') {
            $usuarioLogueado = $this->modelo->verificarLogin($user, $pass);
            if ($usuarioLogueado) {
                $_SESSION['usuario'] = $usuarioLogueado;
                $mensaje = "LOGIN EXITOSO.";
            } else {
                $mensaje = "ERROR: Credenciales incorrectas.";
            }
        } 
        else if (isset($_SESSION['usuario'])) {
            $usuarioLogueado = $_SESSION['usuario'];
        }

        $titulo = "Login";
        include 'views/login.php';
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?accion=login");
        exit();
    }

    public function retiro() {
        $mensaje = '';
        
        if (!isset($_SESSION['usuario'])) {
            $mensaje = "ERROR: Debe iniciar sesión para operar.";
            $saldoActual = 0;
        } else {
            $usuario = $_SESSION['usuario'];
            $idUsuario = $usuario['id_usuario'];
            $saldoActual = $usuario['saldo'];
            
            $monto = isset($_POST['monto']) ? (float)$_POST['monto'] : 0;
            $tipoOperacion = isset($_POST['operacion']) ? $_POST['operacion'] : '';

            if ($monto > 0) {
                // NUEVO: Procesar según la operación seleccionada (Depositar o Retirar)
                if ($tipoOperacion === 'depositar') {
                    $nuevoSaldo = $saldoActual + $monto;
                    $this->modelo->actualizarSaldo($idUsuario, $nuevoSaldo);
                    $_SESSION['usuario']['saldo'] = $nuevoSaldo;
                    $saldoActual = $nuevoSaldo;
                    $mensaje = "DEPÓSITO EXITOSO. Ha ingresado $" . number_format($monto, 2);
                } 
                else if ($tipoOperacion === 'retirar') {
                    if ($monto <= $saldoActual) {
                        $nuevoSaldo = $saldoActual - $monto;
                        $this->modelo->actualizarSaldo($idUsuario, $nuevoSaldo);
                        $_SESSION['usuario']['saldo'] = $nuevoSaldo;
                        $saldoActual = $nuevoSaldo;
                        $mensaje = "RETIRO APROBADO. Ha retirado $" . number_format($monto, 2);
                    } else {
                        $mensaje = "ERROR: Fondos insuficientes.";
                    }
                }
            }
        }

        $titulo = "Operaciones";
        include 'views/retiro.php';
    }

    public function listarUsuarios() {
        $usuarios = $this->modelo->listarUsuarios();
        $titulo = "Listado de Usuarios";
        include 'views/usuarios.php';
    }
}
?>