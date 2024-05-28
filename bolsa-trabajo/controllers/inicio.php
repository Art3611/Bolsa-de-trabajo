<?php
require_once __DIR__ .'/../models/QueryEmpresas.php';

/**
 * Clase Inicio
 * 
 * Esta clase representa el controlador principal del proyecto.
 * Contiene métodos para saludar y realizar otras acciones.
 */
class Inicio extends Controller{

  function __construct(){
    parent::__construct();
    $this->model = new QueryEmpresas();
    $this->view->ofertas = [];
  }
  
  function render(){
    $ofertas = $this->model->get();

    if (empty($ofertas)) {
        $this->view->mensaje = 'No hay ofertas de trabajo disponibles en este momentos.';
    } else {
        $this->view->mensaje = 'Ofertas disponibles';
    }
    
    $this->view->tituloPage = "Inicio";
    $this->view->ofertas = $ofertas;
    $this->view->render('inicio/index');
  }

  /**
   * Método saludo
   * 
   * Este método imprime un mensaje para verificar que la aplicacion .
   */
  function saludo(){
    echo "<h1>La aplicacion esta funcionando</h1>";
  }
}

?>
