<?php

require_once __DIR__ . '/userSesion.php';
require_once __DIR__ . '/../models/User.php';

class PerfilUsuario extends Controller {

    public $view;
    public $userSession;

    public function __construct(){
        parent::__construct();
        $this->userSession = new UserSesion();
        $this->model = new User();
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

    /**
     * Método que muestra la página de "Ofertas aplicadas" en el perfil del usuario.
     *
     * Este método establece el título de la página y renderiza la vista correspondiente.
     *
     * @return void
     */
    public function ofertasAplicadas(){
        $this->view->tituloPage = "Ofertas aplicadas";
        $this->view->render('perfilUsuario/ofertasAplicadas');
    }

    /**
     * Método que se encarga de aplicar una oferta de trabajo para el usuario actual.
     *
     * @return void
     */
    public function aplicarOferta(){
        $ofertaId = $_POST['oferta_id'];
        $usuarioId = $this->userSession->getCurrentUser()['usuario_id'];
        
        // var_dump($ofertaId, $usuarioId);
        $this->model->aplicarOferta($ofertaId, $usuarioId);
        header('Location: ' . constant('URL') . 'perfilUsuario/ofertasAplicadas');
    }

}

?>