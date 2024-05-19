<?php

require_once __DIR__ . '/userSesion.php';

class PerfilEmpresa extends Controller {

    public $view;
    public $userSession;

    public function __construct(){
        parent::__construct();
        $this->userSession = new UserSesion();
    }

    public function render(){
        $rol_usuario = $this->userSession->getRole();
    
        //Verifica si el usuario es una empresa y muestra la vista
        if ($rol_usuario === 2) { 
            $this->view->tituloPage = "Perfil de empresa";
            $this->view->render('perfilEmpresa/index');
        } else {
            header('Location: ' . constant('URL'));
            exit(); 
        }
    }
}

?>