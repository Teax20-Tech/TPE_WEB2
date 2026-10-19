<?php

require_once './app/model/Model.php';

class ModelUsuario extends Model {

    public function getUsuarioByUsername($usuario) {
        $query = $this->db->prepare(
            'SELECT * FROM usuario
            WHERE usuario = ?'
        );

        $query->execute([$usuario]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}