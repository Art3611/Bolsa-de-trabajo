<?php 

class User extends Model {

    private $password;
    private $rol;

    public function __construct(){
        parent::__construct();
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
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            return "Email no válido";
        }

        // Checa si el email ya está registrado
        $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE email = :email');
        $query->execute(['email' => $data['email']]);
        $existeEmail = $query->fetch(PDO::FETCH_ASSOC);

        $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE nombre = :nombre');
        $query->execute(['nombre' => $data['nombre']]);
        $existeUsuario = $query->fetch(PDO::FETCH_ASSOC);

        if($existeEmail){
            return  'email_existe';
        }

        if($existeUsuario){
            return 'usuario_existe';
        }

        // Hash la contraseña
        $this->hashPassword($data['password']);
        $this->setRol(1);
        $query = $this->db->connect()->prepare('INSERT INTO usuarios (nombre, email, password, rol_id )
                                                VALUES(:nombre, :email, :password, :rol_id)');
        // Registrar usuario
        try {
            $query->execute([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'password' => $this->password,
                'rol_id' => $this->rol
            ]);
            return 'exito';
        } catch (PDOException $e) {
            return false;
        }
    }

    public function login($data){
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            return "Email no válido";
        }

        // Busca al usuario por su correo electrónico
        $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE email = :email');
        $query->execute(['email' => $data['email']]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Verifica si se encontró un usuario con ese correo electrónico
        if($user){
        // Comprueba si la contraseña coincide
        if(password_verify($data['password'], $user['password'])){
            // Las credenciales son válidas, puedes iniciar sesión aquí
            // Por ejemplo, podrías establecer una sesión de usuario o devolver algún tipo de token de autenticación
            return [
                'status' => 'exito',
                'user_id' => $user['id'], // Suponiendo que 'id' es el campo que contiene el ID del usuario en tu tabla de usuarios
                'nombre' => $user['nombre'], // Suponiendo que 'nombre' es el campo que contiene el nombre del usuario
                // Puedes agregar más campos de usuario aquí según sea necesario
            ];
        } else {
            // La contraseña no coincide
            return 'contraseña_invalida';
        }
    } else {
        // No se encontró ningún usuario con ese correo electrónico
        return 'usuario_no_encontrado';
    }
  }
}