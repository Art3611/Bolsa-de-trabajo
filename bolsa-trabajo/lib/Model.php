<?php

class Model {
    public $db;
    public $rol;

    function __construct(){
        $this->db = new Database();
    }

     /**
     * Función para hashear la contraseña del usuario.
     *
     * @param string $password La contraseña a hashear.
     * @return void
     */
    public function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Establece el rol del modelo.
     *
     * @param string $rol El rol a establecer.
     * 1 = usuario
     * 2 = empresa
     * 3 = administrador
     * @return void
     */
    public function setRol($rol) {
        $this->rol = $rol;
    }

}