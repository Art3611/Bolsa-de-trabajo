<?php

require_once __DIR__ . '/../controllers/userSesion.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Empresa.php';

class Login extends Controller {
    public $view;
    public $error;
    public $userModel;
    public $empresaModel;
    
    public function __construct(){
        parent::__construct();
        $this->userModel = new User();
        $this->empresaModel = new Empresa();
    }


    public function render(){
        $this->view->tituloPage = "Inicio de sesión";
        $this->view->render('login/index');
    }

    /**
     * Función que permite iniciar sesión en la aplicación
     *
     */
    public function login() {
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $error = "";

            // Intenta encontrar al usuario en la tabla de usuarios
            $user = $this->userModel->getUserByEmail($email);

            if($user) {
                if(password_verify($password, $user['password'])) {
                    $userSession = new UserSesion();
                    // Devolvemos nombre, rol y ID en la sesión
                    $userSession->setCurrentUser($user['nombre'], $user['rol_id'], $user['descripcion'], $user['id']); 
                    header('Location: '.constant('URL'));
                    exit();
                } else {
                    $error = 'contraseña_invalida';
                }
            } else {
                // Intenta encontrar a la empresa
                $empresa = $this->empresaModel->getEmpresaByEmail($email);

                if($empresa) {
                    if(password_verify($password, $empresa['password'])) {
                        $userSession = new UserSesion();
                        // Devolvemos nombre, rol y ID en la sesión
                        $userSession->setCurrentUser($empresa['nombre_empresa'], $empresa['rol_id'], $empresa['descripcion'], $empresa['id']); 
                        header('Location: '.constant('URL'). 'perfilEmpresa');
                        exit();
                    } else {
                        $error = 'contraseña_invalida';
                    }
                } else {
                    $error = 'usuario_no_encontrado';
                }
            }

            // Si hay un error
            $this->view->error = $this->getErrorMsg($error);
            $this->render();
        } else {
            // Si no se enviaron los datos del formulario
            $this->view->error = $this->getErrorMsg('datos_no_enviados');
            $this->render();
        }
    }

    /**
     * Devuelve el mensaje de error correspondiente al código de error proporcionado.
     *
     * @param string $error El código de error.
     * @return string El mensaje de error correspondiente.
     */
    private function getErrorMsg($error) {
        switch($error) {
            case 'contraseña_invalida':
                return "Contraseña o email incorrecto";
            case 'usuario_no_encontrado':
                return "Esta cuenta no está registrada";
            case 'datos_no_enviados':
                return "Por favor, ingrese sus datos";
            default:
                return "Error en el inicio de sesión";
        }
    }

    /**
     * Cierra la sesión del usuario y redirige a la página principal.
     */
    public function logout(){
        $userSession = new UserSesion();
        $userSession->closeSession();
        header('Location: '.constant('URL'));
    }

}