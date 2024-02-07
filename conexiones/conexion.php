<?php
// Parámetros de conexión a la base de datos
$host = "localhost";  // Cambia esto según tu configuración
$dbname = "Movilnet";  // Cambia esto según tu configuración
$user = "postgres";  // Cambia esto según tu configuración
$password = "postgres";  // Cambia esto según tu configuración

// Intenta establecer la conexión
try {
    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Otros ajustes de conexión si es necesario
} catch (PDOException $e) {
    die("Error al conectar: " . $e->getMessage());
}
?>
