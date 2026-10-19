<?php

require_once './app/model/ModelUsuario.php';
require_once './app/view/ViewAuth.php';

class ControllerAuth {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ModelUsuario();
        $this->view = new ViewAuth();
    }

    public function login() {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $usuarioDB = $this->model->getUsuarioByUsername($usuario);

        if ($usuarioDB && password_verify($password, $usuarioDB->password)) {

            session_start();

            $_SESSION['ID_USER'] = $usuarioDB->id_usuario;
            $_SESSION['USER_NAME'] = $usuarioDB->usuario;

            header('Location: /TPE_WEB2/entradas');

        } else {    
            $this->view->showLogin("Usuario o contraseña incorrectos");
        }
    }

    public function logout() {
        session_start();
        session_destroy();

        header('Location: /TPE_WEB2/entradas');
    }

    public function showLogin() {
        $this->view->showLogin();
    }


}