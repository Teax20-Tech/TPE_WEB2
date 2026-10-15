<?php

require_once './app/controller/ControllerEntrada.php';
require_once './app/controller/ControllerCliente.php';

$controllerEntrada = new ControllerEntrada();
$controllerCliente = new ControllerCliente();

$action = $_GET['action'] ?? '';

$params = explode('/', $action);

switch ($params[0]) {
    case '':
        $controllerEntrada->showEntradas();
        break;

    case 'entradas':
        $controllerEntrada->showEntradas();
        break;

    case 'clientes':
        if (isset($params[1]) && isset($params[2]) && $params[2] == 'entradas') {
            $controllerEntrada->showEntradasByCliente($params[1]);
        } else {
            $controllerCliente->showClientes();
        }
    break;
    
    case 'entrada':
        $controllerEntrada->showEntrada($params[1]);
    break;

    default:
        echo "Página no encontrada";
        break;
}