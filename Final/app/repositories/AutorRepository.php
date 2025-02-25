<?php
// Incluir la definición de la entidad Autor.
require_once __DIR__ . '/../models/Autor.php';

/**
 * Clase AutorRepository: Encapsula las operaciones CRUD en la base de datos
 * para la entidad Autor.
 */
class AutorRepository {
    private $conn;
    private $table_name = "autores";

    // Constructor que recibe la conexión a la base de datos.
    public function __construct($db){
        $this->conn = $db;
    }

    public function create(Autor $autor){
        $query = "INSERT INTO {$this->table_name} (nombre, apellido, nacionalidad) 
                  VALUES (:nombre, :apellido, :nacionalidad)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $autor->getNombre());
        $stmt->bindParam(":apellido", $autor->getApellido());
        $stmt->bindParam(":nacionalidad", $autor->getNacionalidad());
        return $stmt->execute();
    }

    public function readAll(){
        $query = "SELECT * FROM {$this->table_name}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update(Autor $autor){
        $query = "UPDATE {$this->table_name} 
                  SET nombre = :nombre, apellido = :apellido, nacionalidad = :nacionalidad 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $autor->getNombre());
        $stmt->bindParam(":apellido", $autor->getApellido());
        $stmt->bindParam(":nacionalidad", $autor->getNacionalidad());
        $stmt->bindParam(":id", $autor->getId());
        return $stmt->execute();
    }

    public function delete($id){
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function readOne($id){
        $query = "SELECT * FROM {$this->table_name} WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
