<?php

require_once __DIR__ . '/userSesion.php';
require_once __DIR__ . '/../models/Empresa.php';
require_once __DIR__ . '/../models/Ofertas.php';
require_once __DIR__ . '/../models/Aplicaciones.php';
require_once __DIR__ . '/../models/QueryEmpresas.php';

class PerfilEmpresa extends Controller {

    public $view;
    public $userSession;
    public $ofertaModel;

    public function __construct(){
        parent::__construct();
        $this->userSession = new UserSesion();
        $this->model = new Empresa();
        $this->view->ofertas = [];
        $this->view->aplicaciones = [];
    
        $this->ofertaModel = new QueryEmpresas();
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
            header('Location: ' . constant('URL') . 'perfilEmpresa/ofertasPublicadas');
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

    /**
     * Método que muestra las ofertas de trabajo aplicadas por la empresa.
     */
    public function OfertasAplicadas() {
        $empresaModel = new Empresa();
        $ofertasAplicadas = $empresaModel->verOfertasAplicadas($this->userSession->getUserId());
        
        if(!$ofertasAplicadas){
            $this->view->mensaje = "No hay ofertas aplicadas";
        }

        $view = new View();
        $view->aplicaciones = $ofertasAplicadas;
        
        $this->view->tituloPage = "Ofertas aplicadas";
        $view->render('perfilEmpresa/ofertasAplicadas');
    }
    
    /**
     * Elimina una oferta de trabajo.
     *
     * @param array|null $param - Parámetro que contiene la oferta a eliminar.
     * @return void
     */
    public function eliminarOferta($param = null){
        $oferta = $param[0];

        if($this->model->delete($oferta)){
            $this->view->mensaje = "oferta eliminada correctamente";
        }else {
            $this->view->mensaje = "No se pudo eliminar el alumno";
        }
        $this->render();
    }


    /**
     * Método para editar una oferta de trabajo.
     *
     * @param array|null $param - Parámetro opcional que contiene el ID de la oferta a editar.
     * @return void
     */
    public function editarOferta($param = null){
        $id_oferta = $param[0];
        $oferta = $this->ofertaModel->getById($id_oferta);

        $this->view->oferta = $oferta;
        $this->view->tituloPage = "Editar oferta";
        $this->view->render('perfilEmpresa/editarOferta');
    }

    /**
     * Actualiza una oferta de trabajo en la base de datos.
     *
     * @param array|null $param - Parámetros adicionales para la actualización de la oferta.
     * @return void
     */
    public function actualizarOferta($param = null){

        $id_oferta = $param[0];
        $nombre = $_POST['nombre_trabajo'];
        $descripcion = $_POST['descripcion'];
        $ubicacion = $_POST['ubicacion'];
        $contrato = $_POST['contrato'];
        $salario = $_POST['salario'];
        $duracion = $_POST['duracion'];
        $requisitos = $_POST['requisitos'];

        if($this->model->update($id_oferta, [
            'nombre_trabajo' => $nombre,
            'descripcion' => $descripcion,
            'ubicacion' => $ubicacion,
            'contrato' => $contrato,
            'salario' => $salario,
            'duracion' => $duracion,
            'requisitos' => $requisitos
        ])){
            $this->view->mensaje = "Oferta actualizada correctamente";
            header('Location: ' . constant('URL') . 'perfilEmpresa');
            exit();
        }
    }

    /**
     * Obtiene los datos de un aplicador y los muestra en la vista.
     *
     * @param array|null $param Parámetro opcional que contiene el ID del usuario aplicador.
     * @return void
     */
    public function datosAplicador($param = null) {
        if ($param && isset($param[0])) {
            $id_usuario = $param[0];
            $usuario = $this->model->verDatos($id_usuario);
            if ($usuario) {
                $this->view->tituloPage = 'Detalles del aspirante';
                $this->view->usuario = $usuario;
            } else {
                $this->view->mensaje = "No se encontraron datos";
            }
        } else {
            $this->view->mensaje = "ID de aplicación no válido";
        }
        $this->view->render('perfilEmpresa/datosAplicador');
    }
}

?>