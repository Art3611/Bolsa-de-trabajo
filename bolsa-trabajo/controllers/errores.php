<?php

/**
 * Clase ErrorFile
 * 
 * Esta clase representa un controlador de errores en la aplicación.
 * Se utiliza para mostrar un mensaje de error al cargar un recurso.
 */
class Errores extends Controller{
   protected $view;

  /**
   * Constructor de la clase ErrorFile.
   * 
   * Imprime un mensaje de error al cargar un recurso.
   */
  function __construct(){
    parent::__construct();
    $this->view->mensaje = "Error al cargar el recurso";
    $this->view->render('errores/index');
  }
}

?>
