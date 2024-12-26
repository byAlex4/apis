<?php

require_once "./controller/pacienteController.php"; // Asegúrate de que el nombre del directorio y archivo es correcto

// Obtener el método de la solicitud
$method = $_SERVER['REQUEST_METHOD'];
$basePath = '/my-api'; // Define la base de tu API
$path = str_replace($basePath, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));


header('Content-Type: application/json');

$controller = new pacienteController();

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