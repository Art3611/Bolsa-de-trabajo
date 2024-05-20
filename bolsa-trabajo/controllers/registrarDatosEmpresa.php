<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/Empresa.php';

class RegistrarDatosEmpresa extends Controller{
    public $view;

    public function __construct(){
        parent::__construct();
        $this->model = new Empresa();
    }

    public function render(){
        $this->view->tituloPage = "Registro de datos de empresa";
        $this->view->render('registrarDatosEmpresa/index');
    }

    public function insertarDatosEmpresa() {

    }

}

?>