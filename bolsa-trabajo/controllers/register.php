<?php

require_once '/opt/lampp/htdocs/proyectointegrado2t2024-DiosTeOdia/bolsa-trabajo/models/User.php';

class Register extends Controller {

    public $view;
    public $mensaje;

    public function __construct(){
        parent::__construct();
        $this->model = new User();
    }

    public function render(){
        $this->view->tituloPage = "Inicio de sesión";
        $this->view->render('register/index');
    }

    public function registerUser(){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $mensaje = "";

        if($this->model->register([
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password
            ])){
                $mensaje = "Usuario registrado correctamente";
            }else {
                $mensaje = "El usuario no se pudo registrar";
            }
            $this->view->mensaje = $mensaje;
            $this->render();
    }

}