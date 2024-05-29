<?php
require_once __DIR__ . '/userSesion.php';
require_once __DIR__ . '/../models/Empresa.php';
require_once __DIR__ . '/../models/Ofertas.php';
require_once __DIR__ . '/../models/Aplicaciones.php';

class PerfilEmpresa extends Controller {

    public $view;
    public $userSession;

    public function __construct(){
        parent::__construct();
        $this->userSession = new UserSesion();
        $this->model = new Empresa();
        $this->view->ofertas = [];
        $this->view->aplicaciones = [];
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

    /**
     * Muestra la vista para publicar una oferta de trabajo
     *
     */
    public function publicarOferta(){
        $this->view->tituloPage = "Publicar oferta";
        $this->view->render('perfilEmpresa/publicarOferta');
    }

    /**
     * Registra una oferta de trabajo en la base de datos
    *
    */
    public function registrarOferta(){
        //Registrar los datos de la oferta aqui
        $nombre = $_POST['nombre_trabajo'];
        $descripcion = $_POST['descripcion'];
        $ubicacion = $_POST['ubicacion'];
        $contrato = $_POST['contrato'];
        $salario = $_POST['salario'];
        $duracion = $_POST['duracion'];
        $requisitos = $_POST['requisitos'];
        $resultado  = $this->model->registrarOferta([
            'nombre_trabajo' => $nombre,
            'descripcion' => $descripcion,
            'ubicacion' => $ubicacion,
            'contrato' => $contrato,
            'salario' => $salario,
            'duracion' => $duracion,
            'requisitos' => $requisitos
        ]);

        if($resultado === 'oferta_registrada'){
            header('Location: ' . constant('URL') . 'perfilEmpresa');
            exit();
        }
        $this->render();
    }

    /**
     * Método que muestra las ofertas de trabajo publicadas por la empresa.
     *
     * @return void
     */
    public function ofertasPublicadas() {
        $this->view->tituloPage = "Ofertas publicadas";
        $userId = $this->userSession->getUserId();

        if ($userId) {
            $ofertas = $this->model->getByEmpresaId($userId);
            if ($ofertas) {
                $this->view->ofertas = $ofertas;
            } else {
                $this->view->ofertas = [];
                $this->view->mensaje = 'No hay ofertas publicadas';
            }
        } else {
            $this->view->ofertas = [];
            $this->view->mensaje = 'Error al obtener el ID de usuario';
        }

        $this->view->render('perfilEmpresa/ofertasPublicadas');
    }

    public function OfertasAplicadas() {
        $empresaModel = new Empresa();
        $ofertasAplicadas = $empresaModel->verOfertasAplicadas($this->userSession->getUserId());
        
        if(!$ofertasAplicadas){
            $this->view->mensaje = "No hay ofertas aplicadas";
        }

        $view = new View();
        $view->aplicaciones = $ofertasAplicadas;
        
        $view->render('perfilEmpresa/ofertasAplicadas');
    }
    

    public function eliminarOferta($param = null){
        $oferta = $param[0];

        if($this->model->delete($oferta)){
            $this->view->mensaje = "oferta eliminada correctamente";
        }else {
        $this->view->mensaje = "No se pudo eliminar el alumno";
        }
        $this->render();
    }
    
}

?>