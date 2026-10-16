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

    public function showFormAddCliente() {
        $this->view->showFormAddCliente();
    }


    public function addCliente() {
        $socio = isset($_POST['socio']) ? 1 : 0;
        $nombre = $_POST['nombre'];
        $fechaNacimiento = $_POST['fecha_nacimiento'];

        $this->model->insertCliente(
            $socio,
            $nombre,
            $fechaNacimiento
        );

        header('Location: /TPE_WEB2/clientes');
    }


    public function showFormEditCliente($id) {
        $cliente = $this->model->getCliente($id);

        $this->view->showFormEditCliente($cliente);
    }


    public function editCliente($id) {
        $socio = isset($_POST['socio']) ? 1 : 0;
        $nombre = $_POST['nombre'];
        $fechaNacimiento = $_POST['fecha_nacimiento'];

        $this->model->updateCliente(
            $id,
            $socio,
            $nombre,
            $fechaNacimiento
        );

        header('Location: /TPE_WEB2/clientes');
    }

    public function deleteCliente($id) {
        try {
            $this->model->deleteCliente($id);

            header('Location: /TPE_WEB2/clientes');
        } catch (PDOException $e) {
            echo "No se puede eliminar el cliente porque tiene entradas asociadas.";
            echo '<br><br>';
            echo '<a href="/TPE_WEB2/clientes">Volver al listado de clientes</a>';
        }
    }
}