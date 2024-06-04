<?php

require_once 'models/Ofertas.php';

/**
 * Clase QueryEmpresas
 * 
 * Esta clase representa un modelo para realizar consultas relacionadas con las empresas y las ofertas de trabajo.
 */
class QueryEmpresas extends Model {
    /**
     * Constructor de la clase QueryEmpresas.
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Obtener todas las ofertas de trabajo.
     * 
     * @return array Un array de objetos Oferta que representa todas las ofertas de trabajo encontradas.
     */
    public function get(){
        $items = [];
    
        try {
            // Ejecuta la consulta SQL
            $this->db->query("SELECT * FROM ofertas_trabajo");
            
            // Obtiene todos los resultados como un array asociativo
            $ofertas = $this->db->fetchAll();
    
            if ($ofertas) { // Verifica si hay resultados
                // Itera sobre $ofertas
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
                    
                    // Agregar el objeto Oferta al array $items
                    $items[] = $item;
                }
            } else {
                // Manejar el caso en el que no se encuentren ofertas
                return false;
            }
            
            return $items;
    
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Obtener una oferta de trabajo por su ID.
     * 
     * @param int $id_oferta El ID de la oferta de trabajo a buscar.
     * @return Oferta|null Un objeto Oferta que representa la oferta de trabajo encontrada, o null si no se encuentra.
     */
    public function getById($id_oferta){
        try {
            // Prepara la consulta SQL con un marcador de posición
            $this->db->query("SELECT * FROM ofertas_trabajo WHERE id = :id");

            // Vincula el valor del ID al marcador de posición
            $this->db->bind(':id', $id_oferta);

            // Ejecuta la consulta y obtiene el resultado
            $oferta = $this->db->single();

            if ($oferta) {
                // Crea una instancia de Oferta y asigna los valores
                $item = new Oferta();
                $item->id = $oferta['id'];
                $item->empresa_id = $oferta['empresa_id'];
                $item->nombre_trabajo = $oferta['nombre_trabajo'];
                $item->descripcion = $oferta['descripcion'];
                $item->ubicacion = $oferta['ubicacion'];
                $item->salario = $oferta['salario'];
                $item->contrato = $oferta['contrato'];
                $item->duracion = $oferta['duracion'];
                $item->requisitos = $oferta['requisitos'];

                return $item;
            } else {
                return null;
            }

        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Obtiene una oferta de trabajo por su ID de empresa.
     *
     * @param int $id_oferta El ID de la oferta de trabajo.
     * @return Oferta|null La oferta de trabajo correspondiente al ID de empresa especificado, o null si no se encuentra.
     */
    public function getByEmpresaId($id_oferta){
        try {
            $this->db->query("SELECT * FROM ofertas_trabajo WHERE id = :id");
            $this->db->bind(':id', $id_oferta);
            $ofertaData = $this->db->single();

            $oferta = new Oferta();
            $oferta->id = $ofertaData['empresa_id']; 

            return $oferta;

        } catch (PDOException $e) {
            return [];
        }
    }

}