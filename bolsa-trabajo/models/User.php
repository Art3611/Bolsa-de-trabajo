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

    /**
     * Función para hashear la contraseña del usuario.
     *
     * @param string $password La contraseña a hashear.
     * @return void
     */
    public function hashPassword($password){
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }


    public function register($data){
        // Hashear la contranseña
        $this->hashPassword($data['password']);
        $query = $this->db->connect()->prepare('INSERT INTO usuarios (nombre, email, password, rol_id )
                                                VALUES(:nombre, :email, :password, :rol_id)');
        //Registrar un usuario
        try {
            $query->execute([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'password' => $this->password,
                'rol_id' => 1
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}