<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/Empresa.php';

class RegistroEmpresa extends Controller {

    public $view;
    public $mensaje;
    public $error;

    public function __construct(){
        parent::__construct();
        $this->model = new Empresa();
    }

    public function render(){
        $this->view->tituloPage = "Registro de empresa";
        $this->view->render('registroEmpresa/index');
    }

    /**
     * Función para registrar una empresa.
     *
     * Esta función recibe los datos de una empresa a través de una solicitud POST y los utiliza para registrarla en el sistema.
     * Si el registro es exitoso, redirige al usuario a la página de inicio de sesión. Si la empresa ya está registrada o el email 
     * ya está en uso, muestra un mensaje de error correspondiente.
     */
    public function registrarEmpresa() {
        $mensaje = "";
        $error = "";
        
        $nombre = $_POST['nombre_empresa'];
        $industria = $_POST['industria'];
        $locacion = $_POST['locacion'];
        $nif = $_POST['nif'];
        $descripcion = $_POST['descripcion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $resultado = $this->model->register([
            'nombre_empresa' => $nombre,
            'email' => $email,
            'password' => $password,
            'industria' => $industria,
            'locacion' => $locacion,
            'nif' => $nif,
            'descripcion' => $descripcion,
            'telefono' => $telefono
        ]);
        
        if($resultado === 'empresa_registrada'){
            header('Location: ' . constant('URL') . 'login');
            exit();
        }elseif($resultado === 'usuario_existe'){
            $error = "Empresa ya registrada";
        }elseif($resultado === 'email_existe'){
            $error = "Email ya registrado";
        }
        
        $this->view->error = $error;
        $this->view->mensaje = $mensaje;
        $this->render();
    }

}

?>