<?php

require_once __DIR__ . '/userSesion.php';

class PerfilUsuario extends Controller {

    public $view;
    public $userSession;

    public function __construct(){
        parent::__construct();
        $this->userSession = new UserSesion();
    }

    public function render(){
        $rol_usuario = $this->userSession->getRole();
    
        //Verifica si el usuario es un candidato y muestra la vista
        if ($rol_usuario === 1) { 
            $this->view->tituloPage = "Perfil de usuario";
            $this->view->render('perfilUsuario/index');
        } else {
            header('Location: ' . constant('URL'));
            exit(); 
        }
    }

    public function ofertasAplicadas(){
        $this->view->tituloPage = "Ofertas aplicadas";
        $this->view->render('perfilUsuario/ofertasAplicadas');
    }


}

?>