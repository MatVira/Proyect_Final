<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../services/LibroService.php';

/**
 * Clase LibroController: Gestiona las peticiones HTTP relacionadas con los Libros.
 */
class LibroController {
    private $libroService;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->libroService = new LibroService($db);
    }

    public function index() {
        $result = $this->libroService->getAll();
        echo json_encode($result);
    }

    public function show($id) {
        $result = $this->libroService->getById($id);
        if ($result) {
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Libro no encontrado.']);
        }
    }

    public function store() {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->titulo) && !empty($data->descripcion) && !empty($data->autor_id)) {
            if ($this->libroService->create($data)) {
                http_response_code(201);
                echo json_encode(['message' => 'Libro creado exitosamente.']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'Error al crear el libro.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Datos incompletos.']);
        }
    }

    public function update() {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->id) && !empty($data->titulo) && !empty($data->descripcion) && !empty($data->autor_id)) {
            if ($this->libroService->update($data)) {
                echo json_encode(['message' => 'Libro actualizado.']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'No se pudo actualizar el libro.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Datos incompletos.']);
        }
    }

    public function destroy() {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->id)) {
            if ($this->libroService->delete($data->id)) {
                echo json_encode(['message' => 'Libro eliminado.']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'No se pudo eliminar el libro.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'ID no proporcionado.']);
        }
    }
}
?>
