<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . '/../controllers/userSesion.php';
require_once __DIR__ . '/../models/User.php';

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
            
            // Inicializa la variable $error
            $error = "";
    
            // Llama al método login del modelo User para validar las credenciales
            $loginResult = $this->model->login([
                'email' => $email,
                'password' => $password
            ]);
    
            // Maneja el resultado de la autenticación
            switch(true) {
                case is_array($loginResult) && isset($loginResult['status']) && $loginResult['status'] === 'exito':
                $userSession = new UserSesion();
                $userSession->setCurrentUser($loginResult['nombre']); 
                header('Location: '.constant('URL'));
                    break;
                case $loginResult === 'contraseña_invalida':
                    $error = "Contraseña incorrecta";
                    break;
                case $loginResult === 'usuario_no_encontrado':
                    $error = "Esta cuenta no está registrada";
                    break;
                default:
                    $error = "Error en el inicio de sesión";
            }
        }
        
        // Renderiza la vista de inicio de sesión
        $this->view->error = $error;
        $this->render();
    }
    
    public function logout(){
        $userSession = new UserSesion();
        $userSession->closeSession();
        header('Location: '.constant('URL'));
    }    

  
}