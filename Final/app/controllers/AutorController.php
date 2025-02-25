<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../services/AutorService.php';

/**
 * Clase AutorController: Gestiona las peticiones HTTP relacionadas con los Autores.
 */
class AutorController
{
    private $autorService;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->autorService = new AutorService($db);
    }

    public function index()
    {
        $result = $this->autorService->getAll();
        echo json_encode($result);
    }

    public function show($id)
    {
        $result = $this->autorService->getById($id);
        if ($result) {
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Autor no encontrado.']);
        }
    }

    public function store()
    {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->nombre) && !empty($data->apellido) && !empty($data->nacionalidad)) {
            if ($this->autorService->create($data)) {
                http_response_code(201);
                echo json_encode(['message' => 'Autor creado exitosamente.']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'Error al crear el autor.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Datos incompletos.']);
        }
    }

    public function update()
    {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->id) && !empty($data->nombre) && !empty($data->apellido) && !empty($data->nacionalidad)) {
            if ($this->autorService->update($data)) {
                echo json_encode(['message' => 'Autor actualizado.']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'No se pudo actualizar el autor.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Datos incompletos.']);
        }
    }





    public function destroy()
    {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->id) && !empty($data->nombre) && !empty($data->apellido) && !empty($data->nacionalidad)) {
            // Procesar la solicitud
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Datos incompletos.']);
        }

    }
}
?>