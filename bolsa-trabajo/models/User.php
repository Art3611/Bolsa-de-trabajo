<?php 


class User extends Model {

    private $username;
    private $password;
    private $rol;

    public function __construct(){
        parent::__construct();
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setPassword($password){
        //Encripta la contraseña
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function register($data){
        $query = $this->db->connect()->prepare('INSERT INTO usuarios (nombre, email, password )
                                                VALUES(:nombre, :email, :password)');
        //Registrar un usuario
        try {
            $query->execute([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'password' => $this->password,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }

    }
    
}