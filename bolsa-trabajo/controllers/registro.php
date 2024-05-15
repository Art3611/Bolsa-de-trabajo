<?php

require_once __DIR__ . '/../models/User.php';

class Registro extends Controller {

    public $view;
    public $mensaje;
    public $error;

    public function __construct(){
        parent::__construct();
        $this->model = new User();
    }

    public function render(){
        $this->view->tituloPage = "Registro de usuario";
        $this->view->render('registro/index');
    }

    public function registerUser(){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $mensaje = "";
        $error = "";
        $resultado = $this->model->register([
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password
        ]);
            
        if($resultado === 'exito'){
                $mensaje = "Usuario registrado correctamente";
                header('Location: '.constant('URL').'login');
            }elseif($resultado === 'usuario_existe'){
                $error = "Usuario ya registrado";
               
            }elseif($resultado === 'email_existe'){
                $error = "Email ya registrado";
            }
            $this->view->error = $error;
            $this->view->mensaje = $mensaje;
            $this->render();
    }
}