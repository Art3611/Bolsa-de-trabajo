<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'models/Ofertas.php';


class QueryEmpresas extends Model {
    public function __construct(){
        parent::__construct();
    }

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
                    // $item->empresa = $oferta['empresa'];
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
                echo "No se encontraron ofertas.";
            }
            
            return $items;
    
        } catch (PDOException $e) {
            return [];
        }
    }
    
}