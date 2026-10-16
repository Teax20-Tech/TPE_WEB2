<?php

class ViewEntrada {

    public function showEntradas($entradas) {
        require './templates/lista_entradas.phtml';
    }

    public function showEntrada($entrada) {
        require './templates/detalle_entrada.phtml';
    }

    public function showFormAddEntrada($clientes) {
        require './templates/form_alta_entrada.phtml';
    }

    public function showFormEditEntrada($entrada, $clientes) {
        require './templates/form_editar_entrada.phtml';
    }
}