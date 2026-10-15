<?php

class ViewEntrada {

    public function showEntradas($entradas) {
        require './templates/lista_entradas.phtml';
    }

    public function showEntrada($entrada) {
        require './templates/detalle_entrada.phtml';
    }
}