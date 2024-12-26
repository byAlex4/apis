<?php
// Configuración de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de la base de datos
require_once 'Database.php';

// Autoloading de clases
spl_autoload_register(function ($class_name) {
    $path = __DIR__ . '/' . $class_name . '.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        die("Error: No se pudo cargar la clase '$class_name'");
    }
});

// Configuraciones adicionales (puedes agregar más si es necesario)
session_start();
