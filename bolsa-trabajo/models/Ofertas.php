<?php
/**
 * Clase Oferta que representa una oferta de trabajo.
 */
class Oferta {
    public $id;
    public $nombre_trabajo;
    public $descripcion;
    public $fecha_publicacion;
    public $fecha_expiracion;
    public $empresa;
    public $ubicacion;
    public $salario;
    public $contrato;
    public $categoria;
    public $experiencia;
    public $educacion;
    public $jornada;
    public $vacantes;
    public $duracion;
    public $requisitos;
    public $empresa_id;

    /**
     * Constructor de la clase Oferta.
     */
    public function __construct()
    {
        
    }
}