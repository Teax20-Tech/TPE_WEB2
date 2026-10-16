<?php

class ViewCliente {

    public function showClientes($clientes) {
        require './templates/lista_clientes.phtml';
    }

    public function showFormAddCliente() {
        require './templates/form_alta_cliente.phtml';
    }

    public function showFormEditCliente($cliente) {
        require './templates/form_editar_cliente.phtml';
    }
}