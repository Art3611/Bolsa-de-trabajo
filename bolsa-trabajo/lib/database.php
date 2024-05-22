<?php
require_once __DIR__ . '/../config/config.php';

class Database {

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $pdo;
    private $stmt;

    public function __construct(){
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
        $this->connect();
    }

    /**
     * Conecta a la base de datos utilizando los parámetros de conexión proporcionados.
     *
     * @return void
     */
    private function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->pdo = new PDO($connection, $this->user, $this->password, $options);
        }catch(PDOException $e){
            print_r('Error de conexión: ' . $e->getMessage());
        }
    }

    /**
     * Prepara una consulta SQL para ser ejecutada.
     *
     * @param string $query La consulta SQL a preparar.
     * @return void
     */
    public function query($query) {
        $this->stmt = $this->pdo->prepare($query);
    }

    /**
     * Asocia un valor a un parámetro en una sentencia preparada.
     *
     * @param mixed $param El nombre o marcador de posición del parámetro.
     * @param mixed $value El valor que se va a asociar al parámetro.
     * @param int|null $type Opcional. El tipo de datos del parámetro. Si no se especifica, se determina automáticamente.
     *                       Los posibles valores son: PDO::PARAM_INT, PDO::PARAM_BOOL, PDO::PARAM_NULL o PDO::PARAM_STR.
     * @return void
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Ejecuta la consulta preparada y devuelve una sola fila de resultados como un array asociativo.
     *
     * @return array|false El resultado de la consulta como un array asociativo, o false si no hay resultados.
     */
    public function single(){
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll(){
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Ejecuta la consulta preparada.
     *
     * @return bool true si la consulta se ejecutó correctamente, false en caso contrario.
     */
    public function execute(){
        return $this->stmt->execute();
    }
}

?>