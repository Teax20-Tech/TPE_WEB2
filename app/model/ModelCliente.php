<?php

require_once './app/model/Model.php';

class ModelCliente extends Model {

    public function getClientes() {
        $query = $this->db->prepare('SELECT * FROM cliente');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}