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
        $controllerCliente->showClientes();
        break;

    default:
        echo "Página no encontrada";
        break;
}