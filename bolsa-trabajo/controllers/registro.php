<?php

/**
 * Controlador para el registro de usuarios.
 */
class Registro extends Controller {

    public $view;
    public $mensaje;
    public $error;

    /**
     * Crea una nueva instancia del controlador Registro.
     */
    public function __construct(){
        parent::__construct();
        $this->model = new User();
    }

    /**
     * Renderiza la vista de registro de usuario.
     */
    public function render(){
        $this->view->tituloPage = "Registro de usuario";
        $this->view->render('registro/index');
    }

    /**
     * Registra un nuevo usuario.
     */
    public function registerUser(){
        $mensaje = "";
        $error = "";
        
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Llama al método register del modelo User para registrar un nuevo usuario
        $resultado = $this->model->register([
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password
        ]);
        
        // Maneja el resultado del registro
        if($resultado === 'exito'){
            $mensaje = "Usuario registrado correctamente";
            header('Location: '.constant('URL').'login');
        }elseif($resultado === 'usuario_existe'){
            $error = "Usuario ya registrado";
        }elseif($resultado === 'email_existe'){
            $error = "Email ya registrado";
        }
        
        $this->view->error = $error;
        $this->view->mensaje = $mensaje;
        $this->render();
    }
}