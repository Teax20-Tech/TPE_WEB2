<?php

require_once './app/model/ModelEntrada.php';
require_once './app/view/ViewEntrada.php';
require_once './app/model/ModelCliente.php';

class ControllerEntrada {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ModelEntrada();
        $this->view = new ViewEntrada();
    }

    public function showEntradas() {
        $entradas = $this->model->getEntradas();
        $this->view->showEntradas($entradas);
    }

    public function showEntrada($id) {
        $entrada = $this->model->getEntrada($id);
        $this->view->showEntrada($entrada);
    }
    
    public function showEntradasByCliente($idCliente) {
        $entradas = $this->model->getEntradasByCliente($idCliente);
        $this->view->showEntradas($entradas);
    }

    public function addEntrada() {
        $valorFinal = $_POST['valor_final'];
        $tipoEntrada = $_POST['tipo_entrada'];
        $descuentoAplicado = $_POST['descuento_aplicado'];
        $idCliente = $_POST['id_cliente'];

        $this->model->insertEntrada(
            $valorFinal,
            $tipoEntrada,
            $descuentoAplicado,
            $idCliente
        );

        header('Location: /TPE_WEB2/entradas');
    }

    public function showFormAddEntrada() {
        $modelCliente = new ModelCliente();
        $clientes = $modelCliente->getClientes();

        $this->view->showFormAddEntrada($clientes);
    }

    public function showFormEditEntrada($id) {
        $entrada = $this->model->getEntrada($id);

        $modelCliente = new ModelCliente();
        $clientes = $modelCliente->getClientes();

        $this->view->showFormEditEntrada($entrada, $clientes);
    }

    public function editEntrada($id) {
        $valorFinal = $_POST['valor_final'];
        $tipoEntrada = $_POST['tipo_entrada'];
        $descuentoAplicado = $_POST['descuento_aplicado'];
        $idCliente = $_POST['id_cliente'];

        $this->model->updateEntrada(
            $id,
            $valorFinal,
            $tipoEntrada,
            $descuentoAplicado,
            $idCliente
        );

        header('Location: /TPE_WEB2/entradas');
    }

    public function deleteEntrada($id) {
        $this->model->deleteEntrada($id);
        header('Location: /TPE_WEB2/entradas');
    }
}