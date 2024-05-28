<?php

require_once __DIR__ . '/../controllers/userSesion.php';
require_once __DIR__ . '/../models/Aplicaciones.php';
require_once __DIR__ . '/../models/Ofertas.php';


/**
 * Clase Empresa
 * 
 * Esta clase representa el modelo de la entidad Empresa en la base de datos.
 * Proporciona métodos para interactuar con la tabla 'empresas'.
 */
class Empresa extends Model {
    private $userSession;

    /**
     * Constructor de la clase Empresa.
     * Llama al constructor de la clase padre (Model).
     */
    public function __construct(){
        parent::__construct();
        $this->userSession = new UserSesion();
    }

    /**
     * Obtiene una empresa por su dirección de correo electrónico.
     * 
     * @param string $email La dirección de correo electrónico de la empresa.
     * @return mixed La empresa encontrada o null si no se encuentra ninguna empresa con el correo electrónico especificado.
     */
    public function getEmpresaByEmail($email) {
        $this->db->query('SELECT * FROM empresas WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }
    
    /**
     * Comprueba si existe una empresa con la dirección de correo electrónico especificada.
     * 
     * @param string $email La dirección de correo electrónico a comprobar.
     * @return bool Devuelve true si existe una empresa con el correo electrónico especificado, de lo contrario devuelve false.
     */
    private function emailExists($email){
        $this->db->query('SELECT * FROM empresas WHERE email = :email');
        $this->db->bind(':email', $email);
        $existeEmail = $this->db->single();
        return $existeEmail !== false;
    }

    /**
     * Comprueba si existe una empresa con el nombre especificado.
     * 
     * @param string $nombre_empresa El nombre de la empresa a comprobar.
     * @return bool Devuelve true si existe una empresa con el nombre especificado, de lo contrario devuelve false.
     */
    private function userExists($nombre_empresa){
        $this->db->query('SELECT * FROM empresas WHERE nombre_empresa = :nombre_empresa');
        $this->db->bind(':nombre_empresa', $nombre_empresa);
        $existeUsuario = $this->db->single();
        return $existeUsuario !== false;
    }

    /**
     * Inserta un nuevo usuario en la tabla 'empresas'.
     * 
     * @param array $data Los datos del usuario a insertar.
     * @return string El resultado de la operación de inserción. Puede ser 'usuario_registrado' si se insertó correctamente, o 'error_registro' si ocurrió un error.
     */
    private function insertUser($data){
        $this->db->query('INSERT INTO empresas (nombre_empresa, industria, locacion, nif, descripcion, telefono, email, password, rol_id )
                        VALUES(:nombre_empresa, :industria, :locacion, :nif, :descripcion, :telefono, :email, :password, :rol_id)');
        $this->db->bind(':nombre_empresa', $data['nombre_empresa']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':rol_id', $data['rol_id']);
        $this->db->bind(':industria', $data['industria']);
        $this->db->bind(':locacion', $data['locacion']);
        $this->db->bind(':nif', $data['nif']);
        $this->db->bind(':descripcion', $data['descripcion']);
        $this->db->bind(':telefono', $data['telefono']);

        if($this->db->execute()){
            return 'empresa_registrada';
        } else {
            return 'error_registro';
        }
    }

    /**
     * Registra un nuevo usuario en la tabla 'empresas'.
     * 
     * @param array $data Los datos del usuario a registrar.
     * @return string El resultado del registro. Puede ser 'Email no válido' si el formato del correo electrónico no es válido, 'email_existe' si ya existe una empresa con el correo electrónico especificado, 'usuario_existe' si ya existe una empresa con el nombre especificado, o el resultado de la inserción si se registró correctamente.
     */
    public function register($data){
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            return "Email no válido";
        }

        if($this->emailExists($data['email'])){
            return 'email_existe';
        }

        if($this->userExists($data['nombre_empresa'])){
            return 'usuario_existe';
        }

        $data['password'] = $this->hashPassword($data['password']);
        $this->setRol(2);
        $data['rol_id'] = $this->rol;

        return $this->insertUser($data);
    }

     /**
     * Registra una nueva oferta laboral en la tabla 'ofertas'.
     * 
     * @param array $data Los datos de la oferta laboral a registrar.
     * @return string El resultado de la operación de registro. Puede ser 'oferta_publicada' si se registró correctamente, o 'error_publicacion' si ocurrió un error.
     */
    public function registrarOferta($data){
        $this->userSession = new UserSesion();
        $empresaId = $this->userSession->getUserId();

        if ($empresaId === null) {
            throw new Exception('Error: empresa_id es NULL');
        }

        $this->db->query('INSERT INTO ofertas_trabajo (nombre_trabajo, descripcion, ubicacion, contrato, salario, duracion, requisitos, empresa_id, fecha_publicacion)
                        VALUES(:nombre_trabajo, :descripcion, :ubicacion, :contrato, :salario, :duracion, :requisitos, :empresa_id, NOW())');
        $this->db->bind(':nombre_trabajo', $data['nombre_trabajo']);
        $this->db->bind(':descripcion', $data['descripcion']);
        $this->db->bind(':ubicacion', $data['ubicacion']);
        $this->db->bind(':contrato', $data['contrato']);
        $this->db->bind(':salario', $data['salario']);
        $this->db->bind(':duracion', $data['duracion']);
        $this->db->bind(':requisitos', $data['requisitos']);
        $this->db->bind(':empresa_id', $empresaId);

        if($this->db->execute()){
            return 'oferta_publicada';
        } else {
            return 'error_publicacion';
        }
    }

     /**
     * Obtener todas las ofertas de trabajo de una empresa específica.
     * 
     * @param int $id_empresa El ID de la empresa.
     * @return array Un array de objetos Oferta que representa todas las ofertas de trabajo de la empresa encontradas.
     */
    public function getByEmpresaId($id_empresa) {
        $items = [];
    
        try {
            $this->db->query("SELECT * FROM ofertas_trabajo WHERE empresa_id = :id");
            $this->db->bind(':id', $id_empresa);
            $ofertas = $this->db->fetchAll();
    
            if ($ofertas) {
                foreach ($ofertas as $oferta) {
                    $item = new Oferta();
                    $item->id = $oferta['id'];
                    $item->nombre_trabajo = $oferta['nombre_trabajo'];
                    $item->descripcion = $oferta['descripcion'];
                    $item->ubicacion = $oferta['ubicacion'];
                    $item->salario = $oferta['salario'];
                    $item->contrato = $oferta['contrato'];
                    $item->duracion = $oferta['duracion'];
                    $item->requisitos = $oferta['requisitos'];
                    $items[] = $item;
                }
                return $items;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return [];
        }
    }
    


    public function verOfertasAplicadas($id_empresa) {
        $items = [];
    
        try {
            $this->db->query("SELECT a.*, o.nombre_trabajo FROM aplicaciones a JOIN ofertas_trabajo o ON a.oferta_id = o.id WHERE o.empresa_id = :id");
            $this->db->bind(':id', $id_empresa);
            $aplicaciones = $this->db->fetchAll();
    
            if ($aplicaciones) {
                foreach ($aplicaciones as $aplicacion) {
                    $item = new Aplicaciones();
                    $item->id = $aplicacion['id'];
                    $item->nombre_trabajo = $aplicacion['nombre_trabajo'];
                    // Asignar otros campos relevantes si es necesario
                    $items[] = $item;
                }
            } else {
                return false;
            }
    
            return $items;
    
        } catch (PDOException $e) {
            return [];
        }
    }

    public function delete($id){
        try {
            $this->db->query("DELETE FROM ofertas_trabajo WHERE id = :id");
            $this->db->bind(':id', $id);
            $this->db->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }   
    }
}

?>