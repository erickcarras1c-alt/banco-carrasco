<?php
require_once 'config/conexion.php';
require_once 'model/UsuarioModels.php';
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
        $controlador->login();
        break;
    case 'auditoria':
        $controlador->login();
        break;
        
    default:
        echo "Bienvenido al Sistema Bancario . <br>";
        echo "Prueba en la URL con: ?accion=login&u=admin&p=1234";
        break;
}
?>