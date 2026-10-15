<?php

require_once './app/model/ModelEntrada.php';
require_once './app/view/ViewEntrada.php';

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
}