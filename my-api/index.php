<?php

require_once "./controller/pacienteController.php";

// Obtener el método de la solicitud
$method = $_SERVER['REQUEST_METHOD'];
$basePath = '/my-api'; // Define la base de tu API
$path = str_replace($basePath, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Configurar los encabezados CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

$controller = new pacienteController();

if ($method == 'OPTIONS') {
    // Responder a las solicitudes OPTIONS (preflight)
    http_response_code(200);
    exit();
}

if ($method == 'GET' && $path == '/pacientes') {
    // Listar todas las atenciones
    $datos = $controller->index();
    echo json_encode($datos);
} elseif ($method == 'POST' && $path == '/pacientes') {
    // Crear una nueva atención
    $datos = json_decode(file_get_contents('php://input'), true);
    $id = $controller->create($datos);
    echo json_encode(["id" => $id]);
} elseif ($method == 'DELETE' && preg_match('/\/pacientes\/(\d+)/', $path, $matches)) {
    // Eliminar una atención
    $id = $matches[1];
    $result = $controller->delete($id);
    echo json_encode(["result" => $result]);
} else {
    echo json_encode(["error" => "Ruta no encontrada"]);
}
?>