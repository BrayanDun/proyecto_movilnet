<?php
// detalles_servidor.php

// Configuraciones de la base de datos (reutiliza estas variables o ajusta según sea necesario)
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Obtén el ID del servidor desde la solicitud GET
$servidorId = isset($_GET['id']) ? $_GET['id'] : null;

// Validación del ID del servidor
if ($servidorId === null) {
    // Manejo de error: el ID del servidor no se proporcionó correctamente
    http_response_code(400);
    echo json_encode(['error' => 'ID del servidor no proporcionado correctamente']);
    exit;
}

try {
    // Crea una conexión a la base de datos
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilitar manejo de errores

    // Consulta SQL para obtener detalles del servidor
    $SQL_READ = "SELECT * FROM servidores WHERE id = :id";
    $stmt = $conn->prepare($SQL_READ);
    $stmt->bindParam(":id", $servidorId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Devuelve los detalles del servidor en formato JSON
        $detallesServidor = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($detallesServidor);
    } else {
        // Manejo de error: el servidor no fue encontrado
        http_response_code(404);
        echo json_encode(['error' => 'Servidor no encontrado']);
    }
} catch (PDOException $e) {
    // Manejo de error: error en la conexión o consulta SQL
    http_response_code(500);
    echo json_encode(['error' => 'Error en la base de datos: ' . $e->getMessage()]);
}
?>
