<?php
// NUEVO: Iniciar manejo de sesiones para recordar al usuario navegando entre páginas
session_start();

require_once 'config/conexion.php';
require_once 'models/UsuarioModel.php';
require_once 'controllers/BancoController.php';

$accion = isset($_GET['accion']) ? $_GET['accion'] : 'inicio';

$controlador = new BancoController();

switch ($accion) {
    case 'login':
        $controlador->login();
        break;
    case 'retiro':
        $controlador->retiro();
        break;
    case 'listar':
        $controlador->listarUsuarios();
        break;
    case 'auditoria':
        echo "Auditoría no implementada.";
        break;
    default:
        $controlador->inicio();
        break;
}
?>