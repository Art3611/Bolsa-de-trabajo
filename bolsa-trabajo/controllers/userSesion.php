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
     * Establece el usuario actual y el rol en la sesión.
     * 
     * @param mixed $user El usuario actual.
     * @param int $rol_id El rol del usuario.
     */
    public function setCurrentUser($user, $rol_id){
        $_SESSION['user'] = $user;
        $_SESSION['rol_id'] = $rol_id;
    }

    /**
     * Obtiene el usuario actual de la sesión.
     * 
     * @return array|null El usuario actual y su rol si están definidos, de lo contrario, null.
     */
    public function getCurrentUser(){
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
        $rol = isset($_SESSION['rol_id']) ? $_SESSION['rol_id'] : null;

        if ($user !== null && $rol !== null) {
            return ['user' => $user, 'rol_id' => $rol];
        }
        return null;
    }

        /**
     * Obtiene el rol del usuario actual.
     * 
     * @return int|null El rol del usuario si está definido, de lo contrario, null.
     */
    public function getRole(){
        $tipoUsuario = $this->getCurrentUser();
        if ($tipoUsuario) {
            return (int) $tipoUsuario['rol_id']; // Asegurarse de que siempre es un entero
        }
        return null;
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