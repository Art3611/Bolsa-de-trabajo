<?php

/**
 * Clase Main
 * 
 * Esta clase representa el controlador principal del proyecto.
 * Contiene métodos para saludar y realizar otras acciones.
 */
class Main{
  function __construct(){
    echo "Controlador main";
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
