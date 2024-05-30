<?php

require_once __DIR__ .'/../models/QueryEmpresas.php';
require_once __DIR__ . '/../models/Ofertas.php';

/**
 * Clase Ofertas
 * 
 * Esta clase representa el controlador para gestionar las ofertas de trabajo.
 */
class Ofertas extends Controller {

    /**
     * Método constructor.
     * 
     * Inicializa el controlador y configura las dependencias necesarias.
     */
    public function __construct(){
        parent::__construct();
        $this->model = new QueryEmpresas();
        $this->view->oferta = [];
    }

    /**
     * Método render.
     * 
     * Renderiza la vista para la lista de ofertas de trabajo.
     */
    public function render(){
        $ofertas  = $this->model->get();

        $this->view->tituloPage = "Ofertas";
        $this->view->ofertas = $ofertas;
        $this->view->render('ofertas/index');
    }

    /**
     * Método VerOferta.
     * 
     * Este método se encarga de mostrar los detalles de una oferta de trabajo específica.
    */
    public function verOferta($param = null){
        if (isset($param[0])) {
            $id_oferta = $param[0];
            $oferta = $this->model->getById($id_oferta);

            if ($oferta) {
                $this->view->oferta = $oferta;
                $this->view->tituloPage = "Detalles de la oferta";
                $this->view->render('ofertas/detalle');
            } else {
               echo "Oferta no encontrada";
                $this->view->render('ofertas/detalle');
            }
        } else {
           echo  "ID de oferta no válido";
            $this->view->render('ofertas/detalle');
        }
    } 
}

?>