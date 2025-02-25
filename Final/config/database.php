<?php
/**
 * Clase Database: Se encarga de establecer la conexión con la base de datos MySQL.
 */
class Database
{
    private $host = "localhost";
    private $db_name = "bd_taller";  // Nombre de la base de datos para libros y autores
    private $username = "root";              // Usuario de MySQL
    private $password = "";                  // Contraseña de MySQL
    public $conn;

    // Método que retorna la conexión a la base de datos
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

?>