<?php 

/**
 * Clase Controller
 * 
 * Esta clase representa un controlador base para la aplicación.
 * Contiene propiedades y métodos comunes que pueden ser utilizados por los controladores específicos.
 */
class Controller {
    protected $view;
    protected $model;

    /**
     * Constructor de la clase Controller.
     * 
     * Crea una nueva instancia de la clase View y la asigna a la propiedad $view.
     */
     public function __construct() {
        $this->view = new View();
    }

    /**
     * Carga un modelo específico.
     * 
     * @param string $model El nombre del modelo a cargar.
     */
    function loadModel($model) {
        $url = 'models/' . $model . 'Model.php';

        if (file_exists($url)) {
            require $url;

            $modelName = $model . 'Model';
            $this->model = new $modelName();
        }
    }
}