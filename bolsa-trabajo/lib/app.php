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
        echo "Nueva app";

        //Recupera el parametro URL
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // Construir la ruta del controlador
        $archivoControlador = 'controllers/' . $url[0] . '.php';

        // Verificar si el controlador existe
        if (file_exists($archivoControlador)) {
            require $archivoControlador;
            $controller = new $url[0];

            if (isset($url[1])) {
                $controller->{$url[1]}();
            }

        } else {
            $controller = new ErrorFile();
        }
    }
}
