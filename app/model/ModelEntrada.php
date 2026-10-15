<?php

require_once './app/model/Model.php';

class ModelEntrada extends Model {

    public function getEntradas() {
        $query = $this->db->prepare('SELECT * FROM entrada');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}