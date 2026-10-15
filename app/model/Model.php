<?php

require_once './config.php';

class Model {

    protected $db;

    public function __construct() {
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST . ";charset=utf8",
            MYSQL_USER,
            MYSQL_PASS
        );

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $this->db->query("SHOW DATABASES LIKE '" . MYSQL_DB . "'");
        $dbExists = $stmt->rowCount() > 0;

        $this->db->exec("CREATE DATABASE IF NOT EXISTS " . MYSQL_DB);
        $this->db->exec("USE " . MYSQL_DB);

        if (!$dbExists) {
            $sql = file_get_contents('./db/db_cine.sql');
            $this->db->exec($sql);
        }
    }
}