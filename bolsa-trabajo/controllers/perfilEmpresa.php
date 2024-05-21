<?php

require_once __DIR__ . '/userSesion.php';
require_once __DIR__ . '/../models/Empresa.php';

class PerfilEmpresa extends Controller {

    public $view;
    public $userSession;

    public function __construct(){
        parent::__construct();
        $this->userSession = new UserSesion();
        $this->model = new Empresa();
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

    public function publicarOferta(){
        $this->view->render('perfilEmpresa/publicarOferta');
    }

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
            header('Location: ' . constant('URL') . 'perfilEmpresa');
            exit();
        }
        $this->render();
    }

}

?>