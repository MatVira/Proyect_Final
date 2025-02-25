<?php
// Incluir la definición de la entidad Libro.
require_once __DIR__ . '/../models/Libro.php';

/**
 * Clase LibroRepository: Encapsula las operaciones CRUD para la entidad Libro.
 * Incluye la columna autor_id para relacionar el libro con un autor.
 */
class LibroRepository {
    private $conn;
    private $table_name = "libros";

    // Constructor que recibe la conexión a la base de datos.
    public function __construct($db){
        $this->conn = $db;
    }

    /**
     * Obtiene todos los libros junto con el nombre del autor.
     *
     * @return PDOStatement Conjunto de resultados.
     */
    public function readAll(){
        // Realizamos un JOIN para obtener el nombre del autor.
        $query = "SELECT l.*, a.nombre as autor_nombre, a.apellido as autor_apellido 
                  FROM {$this->table_name} l 
                  INNER JOIN autores a ON l.autor_id = a.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create(Libro $libro){
        $query = "INSERT INTO {$this->table_name} (titulo, descripcion, fecha_publicacion, autor_id) 
                  VALUES (:titulo, :descripcion, :fecha_publicacion, :autor_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":titulo", $libro->getTitulo());
        $stmt->bindParam(":descripcion", $libro->getDescripcion());
        $stmt->bindParam(":fecha_publicacion", $libro->getFechaPublicacion());
        $stmt->bindParam(":autor_id", $libro->getAutorId());
        return $stmt->execute();
    }

    public function update(Libro $libro){
        $query = "UPDATE {$this->table_name} 
                  SET titulo = :titulo, descripcion = :descripcion, 
                      fecha_publicacion = :fecha_publicacion, autor_id = :autor_id
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":titulo", $libro->getTitulo());
        $stmt->bindParam(":descripcion", $libro->getDescripcion());
        $stmt->bindParam(":fecha_publicacion", $libro->getFechaPublicacion());
        $stmt->bindParam(":autor_id", $libro->getAutorId());
        $stmt->bindParam(":id", $libro->getId());
        return $stmt->execute();
    }

    public function delete($id){
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    /**
     * Obtiene un libro junto con el nombre y apellido del autor.
     */
    public function readOne($id){
        $query = "SELECT l.*, a.nombre as autor_nombre, a.apellido as autor_apellido 
                  FROM {$this->table_name} l 
                  INNER JOIN autores a ON l.autor_id = a.id
                  WHERE l.id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
