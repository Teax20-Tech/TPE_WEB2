<?php

require_once './app/model/ModelCliente.php';
require_once './app/view/ViewCliente.php';

class ControllerCliente {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ModelCliente();
        $this->view = new ViewCliente();
    }

    public function showClientes() {
        $clientes = $this->model->getClientes();
        $this->view->showClientes($clientes);
    }
}