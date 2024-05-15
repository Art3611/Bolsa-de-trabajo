<?php

/**
 * Clase UserSesion
 * 
 * Esta clase se utiliza para administrar las sesiónes de usuario.
 */
class UserSesion {
    /**
     * Constructor de la clase UserSesion.
     * 
     * Inicia la sesión si no está iniciada.
     */
    public function __construct(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Establece el usuario actual en la sesión.
     * 
     * @param mixed $user El usuario actual.
     */
    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    /**
     * Obtiene el usuario actual de la sesión.
     * 
     * @return mixed El usuario actual si está definido, de lo contrario, null.
     */
    public function getCurrentUser(){
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        } else {
            return null; 
        }
    }

    /**
     * Cierra la sesión actual.
     */
    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>