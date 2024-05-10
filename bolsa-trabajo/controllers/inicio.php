<?php

/**
 * Clase Inicio
 * 
 * Esta clase representa el controlador principal del proyecto.
 * Contiene métodos para saludar y realizar otras acciones.
 */
class Inicio extends Controller{

  function __construct(){
    parent::__construct();
  }
  
  function render(){
    $this->view->tituloPage= "Inicio";
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
