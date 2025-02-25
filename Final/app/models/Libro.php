<?php
/**
 * Clase Libro: Representa la entidad "Libro".
 * Incluye una relación con el autor a través del ID del autor.
 */
class Libro {
    // Propiedades privadas
    private $id;
    private $titulo;
    private $descripcion;
    private $fecha_publicacion;
    private $autor_id; // ID del autor

    // Constructor opcional para inicializar propiedades
    public function __construct($titulo = null, $descripcion = null, $fecha_publicacion = null, $autor_id = null) {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha_publicacion = $fecha_publicacion;
        $this->autor_id = $autor_id;
    }

    // Getters y Setters

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getFechaPublicacion() {
        return $this->fecha_publicacion;
    }
    public function setFechaPublicacion($fecha_publicacion) {
        $this->fecha_publicacion = $fecha_publicacion;
    }
    public function getAutorId() {
        return $this->autor_id;
    }
    public function setAutorId($autor_id) {
        $this->autor_id = $autor_id;
    }
}
?>
