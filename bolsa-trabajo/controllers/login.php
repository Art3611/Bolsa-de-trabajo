<?php

require_once '/opt/lampp/htdocs/proyectointegrado2t2024-DiosTeOdia/bolsa-trabajo/models/User.php';

class Login extends Controller {
    public $view;
    public $error;
    
    public function __construct(){
        parent::__construct();
        $this->model = new User();
    }

    public function render(){
        $this->view->tituloPage = "Inicio de sesión";
        $this->view->render('login/index');
    }

    public function loginUser(){
        // Verifica si se enviaron datos del formulario de inicio de sesión
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $this->error = "";

            // Llama al método login del modelo User para validar las credenciales
            $loginResult = $this->model->login([
                'email' => $email,
                'password' => $password
            ]);
            
            // Maneja el resultado de la autenticación
            switch($loginResult){
                case 'exito':
                    // Las credenciales son válidas, redirige a la página de inicio o haz cualquier otra acción necesaria
                    header('Location: '.constant('URL'));
                    exit;
                case 'contraseña_invalida':
                    $error = "Contraseña incorrecta";
                    break;
                case 'usuario_no_encontrado':
                    $error = "Esta cuenta no esta registrada";
                    break;
                default:
                    $error = "Error en el inicio de sesión";
            }
        }
        
        // Renderiza la vista de inicio de sesión
        $this->view->error = $error;
        $this->render();
    }
}