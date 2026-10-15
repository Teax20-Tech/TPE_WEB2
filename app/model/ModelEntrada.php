<?php

require_once './app/model/Model.php';

class ModelEntrada extends Model {

    public function getEntradas() {
        $query = $this->db->prepare(
            'SELECT entrada.*, cliente.nombre AS nombre_cliente
            FROM entrada
            JOIN cliente
            ON entrada.CLIENTE_id_cliente = cliente.id_cliente'
        );

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getEntrada($id) {
        $query = $this->db->prepare(
            'SELECT entrada.*, cliente.nombre AS nombre_cliente
            FROM entrada
            JOIN cliente
            ON entrada.CLIENTE_id_cliente = cliente.id_cliente
            WHERE entrada.id_entrada = ?'
        );

        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getEntradasByCliente($idCliente) {
        $query = $this->db->prepare(
            'SELECT entrada.*, cliente.nombre AS nombre_cliente
            FROM entrada
            JOIN cliente
            ON entrada.CLIENTE_id_cliente = cliente.id_cliente
            WHERE cliente.id_cliente = ?'
        );

        $query->execute([$idCliente]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}