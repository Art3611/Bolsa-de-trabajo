<?php
/**
 * Clase App que representa la aplicación principal.
 */
class App {
    /**
     * Constructor de la clase App.
     * Inicializa la aplicación y maneja las rutas.
     */
    public function __construct() {

        //Recupera el parametro URL
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

          //Validar si se ingreso un controlador
          if(empty($url[0])){
            $archivoControlador = 'controllers/inicio.php';
            require_once $archivoControlador;
            $controller = new Inicio();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }
          

        // Construir la ruta del controlador
        $archivoControlador = 'controllers/' . $url[0] . '.php';

        // Verificar si el controlador existe
        if(file_exists($archivoControlador)){
            require_once $archivoControlador;

            //Inicializar el controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            //Numero de elementos del arreglo
            $nparam = sizeof($url);

            if($nparam > 1 ){
                if($nparam > 2){
                    $param = [];
                    for($i = 2; $i < $nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else {
                    $controller->{$url[1]}();
                }
            }else {
                $controller->render();
            }

        }else {
            $controller = new Errores();
        }

    }
}
