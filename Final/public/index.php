<?php
// Configurar encabezados para respuestas JSON y permitir CORS.
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Manejo de solicitudes OPTIONS (preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Incluir el enrutador y los controladores.
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/AutorController.php';
require_once __DIR__ . '/../app/controllers/LibroController.php';

// Instancia del enrutador
$router = new Router();

// Rutas para Autor.
$autorController = new AutorController();
$router->add('GET', '/autores', fn() => $autorController->index());
$router->add('GET', '/autores/:id', fn($id) => $autorController->show($id));
$router->add('POST', '/autores', fn() => $autorController->store());
$router->add('PUT', '/autores/:id', fn($id) => $autorController->update());
$router->add('DELETE', '/autores/:id', fn($id) => $autorController->destroy());

// Rutas para Libros.
$libroController = new LibroController();
$router->add('GET', '/libros', fn() => $libroController->index());
$router->add('GET', '/libros/:id', fn($id) => $libroController->show($id));
$router->add('POST', '/libros', fn() => $libroController->store());
$router->add('PUT', '/libros/:id', fn($id) => $libroController->update());
$router->add('DELETE', '/libros/:id', fn($id) => $libroController->destroy());

// Obtener la URI solicitada.
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Detectar el directorio base automáticamente para evitar errores con `/Final/public`
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$basePath = rtrim($scriptName, '/');
$uri = preg_replace("#^" . preg_quote($basePath) . "#", '', $uri);

// Si la URI está vacía, redirigir a la raíz
if ($uri == '') {
    $uri = '/';
}

// Despachar la petición
$router->dispatch($_SERVER['REQUEST_METHOD'], $uri);
?>