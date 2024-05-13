<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Auth extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function render(){
        $this->view->tituloPage = "Inicio de sesión";
        $this->view->render('auth/index');
    }
 
    public function login(){

    }

    public function register(){

    }

    public function logout(){

    }
}