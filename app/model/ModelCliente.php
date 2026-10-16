<?php

require_once './app/model/Model.php';

class ModelCliente extends Model {

    public function getClientes() {
        $query = $this->db->prepare('SELECT * FROM cliente');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCliente($id) {
        $query = $this->db->prepare(
            'SELECT * FROM cliente
            WHERE id_cliente = ?'
        );

        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }


    public function insertCliente($socio, $nombre, $fechaNacimiento) {
        $query = $this->db->prepare(
            'INSERT INTO cliente
            (socio, nombre, fecha_nacimiento)
            VALUES (?, ?, ?)'
        );

        $query->execute([
            $socio,
            $nombre,
            $fechaNacimiento
        ]);

        return $this->db->lastInsertId();
    }


    public function updateCliente($id, $socio, $nombre, $fechaNacimiento) {
        $query = $this->db->prepare(
            'UPDATE cliente
            SET socio = ?,
                nombre = ?,
                fecha_nacimiento = ?
            WHERE id_cliente = ?'
        );

        $query->execute([
            $socio,
            $nombre,
            $fechaNacimiento,
            $id
        ]);
    }


    public function deleteCliente($id) {
        $query = $this->db->prepare(
            'DELETE FROM cliente
            WHERE id_cliente = ?'
        );

        $query->execute([$id]);
    }
}