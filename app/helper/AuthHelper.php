<?php

class AuthHelper {

    public static function verify() {

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['ID_USER'])) {
            header('Location: /TPE_WEB2/login');
            exit;
        }
    }
}