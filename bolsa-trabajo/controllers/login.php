<?php


class Login extends Controller {
    public $view;
    public $mensaje;
    
    public function __construct(){
        parent::__construct();
    }

    public function render(){
        $this->view->tituloPage = "Inicio de sesión";
        $this->view->render('login/index');
    }

    public function loginUser(){
    }
}