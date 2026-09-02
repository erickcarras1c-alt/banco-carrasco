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

        // Validar credenciales si se envía usuario y contraseña
        if ($user != '' && $pass != '') {
            $usuarioLogueado = $this->modelo->verificarLogin($user, $pass);
            if ($usuarioLogueado) {
                // Guardar usuario en la sesión para mantenerlo conectado
                $_SESSION['usuario'] = $usuarioLogueado;
                $mensaje = "LOGIN EXITOSO.";
            } else {
                $mensaje = "ERROR: Credenciales incorrectas.";
            }
        } 
        // Cargar sesión activa si no se enviaron datos en la URL/Formulario
        else if (isset($_SESSION['usuario'])) {
            $usuarioLogueado = $_SESSION['usuario'];
        }

        $titulo = "Login";
        include 'views/login.php';
    }

    // NUEVO: Método para cerrar sesión
    public function logout() {
        session_destroy(); // Elimina los datos guardados en la sesión
        header("Location: index.php?accion=login"); // Redirige a la página de login
        exit();
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