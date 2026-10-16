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

    case 'cliente':
        if (isset($params[1]) && $params[1] == 'agregar') {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controllerCliente->addCliente();
            } else {
                $controllerCliente->showFormAddCliente();
            }

        } elseif (isset($params[1]) && $params[1] == 'editar' && isset($params[2])) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controllerCliente->editCliente($params[2]);
            } else {
                $controllerCliente->showFormEditCliente($params[2]);
            }

        } elseif (isset($params[1]) && $params[1] == 'eliminar' && isset($params[2])) {

            $controllerCliente->deleteCliente($params[2]);

        }
        break;
    
    case 'entrada':
        if (isset($params[1]) && $params[1] == 'agregar') {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controllerEntrada->addEntrada();
            } else {
                $controllerEntrada->showFormAddEntrada();
            }

        } elseif (isset($params[1]) && $params[1] == 'editar' && isset($params[2])) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controllerEntrada->editEntrada($params[2]);
            } else {
                $controllerEntrada->showFormEditEntrada($params[2]);
            }

        } elseif (isset($params[1]) && $params[1] == 'eliminar' && isset($params[2])) {

            $controllerEntrada->deleteEntrada($params[2]);

        } else {

            $controllerEntrada->showEntrada($params[1]);
        }
        break;

    default:
        echo "Página no encontrada";
        break;
}