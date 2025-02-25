<?php
require_once __DIR__ . '/../repositories/LibroRepository.php';
require_once __DIR__ . '/../models/Libro.php';

/**
 * Clase LibroService: Gestiona la lógica de negocio para la entidad Libro.
 */
class LibroService {
    private $libroRepository;

    public function __construct($db) {
        $this->libroRepository = new LibroRepository($db);
    }

    public function getAll() {
        $stmt = $this->libroRepository->readAll();
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function getById($id) {
        $data = $this->libroRepository->readOne($id);
        return $data ? $data : null;
    }

    public function create($data) {
        $libro = new Libro();
        $libro->setTitulo($data->titulo);
        $libro->setDescripcion($data->descripcion);
        $libro->setFechaPublicacion($data->fecha_publicacion);
        $libro->setAutorId($data->autor_id); // Asignar el autor
        return $this->libroRepository->create($libro);
    }

    public function update($data) {
        $libro = new Libro();
        $libro->setId($data->id);
        $libro->setTitulo($data->titulo);
        $libro->setDescripcion($data->descripcion);
        $libro->setFechaPublicacion($data->fecha_publicacion);
        $libro->setAutorId($data->autor_id); // Asignar el autor
        return $this->libroRepository->update($libro);
    }

    public function delete($id) {
        return $this->libroRepository->delete($id);
    }
}
?>
