<?php
require_once __DIR__ . '/../repositories/AutorRepository.php';
require_once __DIR__ . '/../models/Autor.php';

/**
 * Clase AutorService: Contiene la lógica de negocio para la entidad Autor.
 */
class AutorService {
    private $autorRepository;

    public function __construct($db) {
        $this->autorRepository = new AutorRepository($db);
    }

    public function getAll() {
        $stmt = $this->autorRepository->readAll();
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function getById($id) {
        $data = $this->autorRepository->readOne($id);
        return $data ? $data : null;
    }

    public function create($data) {
        $autor = new Autor();
        $autor->setNombre($data->nombre);
        $autor->setApellido($data->apellido);
        $autor->setNacionalidad($data->nacionalidad);
        return $this->autorRepository->create($autor);
    }

    public function update($data) {
        $autor = new Autor();
        $autor->setId($data->id);
        $autor->setNombre($data->nombre);
        $autor->setApellido($data->apellido);
        $autor->setNacionalidad($data->nacionalidad);
        return $this->autorRepository->update($autor);
    }

    public function delete($id) {
        return $this->autorRepository->delete($id);
    }
}
?>
